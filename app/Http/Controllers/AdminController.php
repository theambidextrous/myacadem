<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\User;
use App\Level;
use App\Page;
use App\Period;
use App\Ref;
use App\Scale;
use App\State;
use App\Subject;
use App\Work;
use App\Writer;
use App\Order;
use App\Bush;

use Validator;
use Storage;
use Config;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$data = explode("\n", file_get_contents(public_path('txts/writers.txt')));
        return view('admin.a_home')->with([
            'counters' => $this->counters(),
            'recents' => $this->recent(),
        ]);
    }
    public function a_orders()
    {
        return view('admin.a_orders')->with([
            'recents' => $this->recent(10000),
        ]);
    }
    public function a_works()
    {
        return view('admin.a_works')->with([
            'recents' => $this->all_works(500),
        ]); 
    }
    public function a_prices()
    {
        return view('admin.a_prices')->with([
            'recents' => $this->all_prices(500),
        ]); 
    }
    public function add_work(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|string',
            'alias' => 'required|string',
        ]);
        if( $validator->fails() ){
            return redirect()->route('a_works')->with([
                'status' => 201,
                'message' => "Please make sure all required fields are populated",
            ]);
        }
        Work::create($r->all());
        return redirect()->route('a_works')->with([
            'status' => 200,
            'message' => "Work type created successfully",
        ]);
    }
    public function work_drop($id)
    {
        Work::find($id)->update([ 'is_active' => false]);
        return redirect()->route('a_works')->with([
            'status' => 200,
            'message' => "Work type deleted successfully",
        ]);
    }
    public function edit_price(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'id' => 'required|string',
            'newprice' => 'required|string',
        ]);
        if( $validator->fails() ){
            return redirect()->route('a_prices')->with([
                'status' => 201,
                'message' => "Please make sure all required fields are populated",
            ]);
        }
        Scale::find($r->get('id'))->update(['factor' => floatval($r->get('newprice')) + 0.00]);
        return redirect()->route('a_prices')->with([
            'status' => 200,
            'message' => "Price updated successfully",
        ]);
    }
    public function a_admins()
    {
        return view('admin.a_admins')->with([
            'recents' => $this->all_admins(500),
        ]);
    }
    public function admin_add(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'required|string',
            'cpassword' => 'required|string|same:password',
        ]);
        if( $validator->fails() ){
            return redirect()->route('a_admins')->with([
                'status' => 201,
                'message' => "Please make sure all required fields are populated",
            ]);
        }
        $input = $r->all();
        $input['password'] = Hash::make($input['password']);
        $input['address'] = 'none';
        $input['city'] = 'none';
        $input['state'] = 'none';
        $input['zip'] = 'none';
        $input['user_type'] = true;
        $input['pic'] = asset('inner/images/avatars/1.png');
        User::create($input);
        return redirect()->route('a_admins')->with([
            'status' => 200,
            'message' => "Admin users added successfully",
        ]);
    }
    protected function all_admins($take)
    {
        $m = User::where('user_type', true)
            ->orderBy('id', 'desc')
            ->skip(0)
            ->take($take)
            ->get();
        if(is_null($m))      
        {
            return [];
        } 
        return $m->toArray();
    }
    public function add_price(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|string',
            'alias' => 'required|string',
            'type' => 'required|string',
            'factor' => 'required|string',
        ]);
        if( $validator->fails() ){
            return redirect()->route('a_prices')->with([
                'status' => 201,
                'message' => "Please make sure all required fields are populated",
            ]);
        }
        Scale::create($r->all());
        return redirect()->route('a_prices')->with([
            'status' => 200,
            'message' => "New price created successfully",
        ]);
    }
    public function a_bushs()
    {
        return view('admin.a_bushs')->with([
            'recents' => $this->all_bushs(500),
        ]); 
    }
    protected function all_bushs($take = 10)
    {
        $m = Bush::select('email')->groupBy('email')->get();
        if(is_null($m))      
        {
            return [];
        } 
        return $m->toArray();
    }
    protected function all_works($take = 10)
    {
        $m = Work::where('is_active', true)
            ->orderBy('id', 'desc')
            ->skip(0)
            ->take($take)
            ->get();
        if(is_null($m))      
        {
            return [];
        } 
        return $m->toArray();
    }
    protected function all_prices($take = 10)
    {
        $m = Scale::where('is_active', true)
            ->orderBy('id', 'desc')
            ->skip(0)
            ->take($take)
            ->get();
        if(is_null($m))      
        {
            return [];
        } 
        return $m->toArray();
    }
    protected function recent($take = 10)
    {
        $m = Order::where('id', '!=', 0)
            ->orderBy('id', 'desc')
            ->skip(0)
            ->take($take)
            ->get();
        if(is_null($m))      
        {
            return [];
        } 
        return $m->toArray();
    }
    public function stream($file)
    {
        $filename = ('app/cls/'.$file);
        return response()->download(storage_path($filename), null, [], null);
    }
    protected function counters()
    {
        $a = Order::where('paid', true)->sum('order_amount');
        $b = Order::all()->count();
        $c = floatval($a/$b);
        return [ $a, $b, $c];
    }
}

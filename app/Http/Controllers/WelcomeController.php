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
use App\Bush;
use App\Order;

use Validator;
use Storage;
use Config;

class WelcomeController extends Controller
{
    public function welcome() 
    {
        Session::put('orderid', $this->trans_no());
        return view('welcome')->with([
            'calc_data' => $this->calc_data(),
        ]);
    }
    public function howit() 
    {
        return view('howit');
    }
    public function about()
    {
        return view('about');
    }
    public function gr()
    {
        return view('guarantee');
    }
    public function fpricing(Request $r)
    {
        $c = Scale::where('type', $r->get('t'))->get();
        if(is_null($c))
        {
            return [];
        }
        $data = [];
        foreach( $c->toArray() as $_d ){
            $_d['dt'] = date("D, M jS", strtotime('+'.$_d['name'].' hours'));
            array_push($data, $_d);
        }
        return response([
            'data' => $data,
            'status' => 0,
            'message' => 'done'
        ], 200);
    }
    public function init_order(Request $r)
    {
        $email = $r->get('email');
        $orderid = $this->trans_no();
        if( strlen(Session::get('orderid')) )
        {
            $orderid = Session::get('orderid');
        }
        $order_data = [
            'email' => $email,
            'amount' => $r->get('totals'),
            'worktype' => $r->get('calculator-type_of_work'),
            'worklevel' => $r->get('calculator-level_work'),
            'urgency' => $r->get('calculator-urgency'),
            'pages' => $r->get('calculator-number_page'),
            'orderid' => $orderid,
        ];
        Session::put('current_order', $order_data);
        if( Bush::where('email', $email)->count() < 1 )
        {
            Bush::create(['email' => $email]);
        }
        return redirect()->route('order');
    }
    public function order()
    {
        $orderid = $this->trans_no();
        if( strlen(Session::get('orderid')) )
        {
            $orderid = Session::get('orderid');
        }
        $order_data = [
            'email' => null,
            'amount' => 0.00,
            'worktype' => null,
            'worklevel' => null,
            'urgency' => null,
            'pages' => null,
            'orderid' => $orderid,
        ];
        if( is_array(Session::get('current_order')) )
        {
            $order_data = Session::get('current_order');
        }
        return view('order')->with([
            'calc_data' => $this->calc_data_order(),
            'sess' => $order_data,
        ]);
    }
    public function finishOrder(Request $r, $orderid)
    {
        $file_uuid = (string) Str::uuid();
        $edit_uuid = (string) Str::uuid() . (string) Str::uuid() ;
        $validator = Validator::make($r->all(), [
            'essayform-timezone_num' => 'required|string',
            'essayform-type_of_work' => 'required|string',
            'essayform-subject' => 'required|string',
            'levelfactoridlabel' => 'required|string',
            'essayform-number_page' => 'required|string',
            'spacingfactorid' => 'required|string',
            'essayform-urgency' => 'required|string',
            'essayform-email' => 'required|email',
            'essayform-phone' => 'required|string',
            'totalorderamount' => 'required|string',
            'essayform-topic' => 'required|string',
            'essayform-instruction' => 'required|string',
            'essayform-number_of_source' => 'string',
            'essayform-language_work' => 'string',
        ]);
        if( $validator->fails() ){
            return redirect()->route('order')->with([
                'status' => 201,
                'message' => "Please make sure all required fields are populated",
            ]);
        }
        $input = $r->all();
        if( $r->hasfile('essayformfile') )
        {
            $content = $r->file('essayformfile');
            $extension = $content->getClientOriginalExtension();
            $content_name = $file_uuid . '.' . $extension;
            Storage::disk('local')->putFileAs('cls', $content, $content_name);
            $input['content'] = $content_name;
        }
        $input['orderid'] = $orderid;
        $order_payload = [
            'orderid' => $input['orderid'],
            'user_timezone'  => $input['essayform-timezone_num'],
            'type_of_work'  => $input['essayform-type_of_work'],
            'subject'  => $input['essayform-subject'],
            'work_level'  => $input['levelfactoridlabel'],
            'work_pages'  => $input['essayform-number_page'],
            'work_spacing'  => $input['spacingfactorid'],
            'work_urgency'  => $input['essayform-urgency'],
            'user_email'  => $input['essayform-email'],
            'user_phone'  => $input['essayform-phone'],
            'order_amount'  => $input['totalorderamount'],
            'work_topic'  => $input['essayform-topic'],
            'work_instructions'  => $input['essayform-instruction'],
            'work_references'  => $input['essayform-number_of_source'],
            'work_format'  => $input['essayform-language_work'],
            'edit_link'  => route('order_view', ['link' => $edit_uuid] ),
        ];
        Bush::create(['email' => $input['essayform-email']]);
        if( $this->exists_order($orderid) )
        {
            Order::where('orderid', $orderid)->update($order_payload);
            return redirect()->route('pay', [ 'orderid' => $orderid ]);
        }else
        {
            Order::create($order_payload);
            return redirect()->route('pay', [ 'orderid' => $orderid ]);
        }
    }
    public function pay($orderid)
    {
        $meta = Order::where('orderid', $orderid)->where('paid', false)->first();
        $data = [
            'orderid' => $orderid,
            'amount' => $meta->order_amount,
            'email' => $meta->user_email,
            'phone' => $meta->user_phone,
        ];
        return view('pay')->with([
            'sess' => $data,
        ]);
    }
    protected function calc_data_order()
    {
        $page = 1;
        $cost = 16;
        $level_factor = 0.95;
        $init_price = floatval( $page * $cost * $level_factor );
        if(Session::get('current_order')['amount'])
        {
            $init_price = Session::get('current_order')['amount'];
        }

        $a = Work::where('is_active', true)->get()->toArray();
        $b = Level::where('is_active', true)->get()->toArray();
        $c = Scale::where('type', 1)->where('is_active', true)->get()->toArray();
        $d = Page::where('is_active', true)->get()->toArray();
        $e = Subject::where('is_active', true)->get()->toArray();
        $f = State::where('is_active', true)->get()->toArray();
        return [ $a, $b, $c, $d, $init_price, $e, $f ];
    }
    protected function exists_order($id)
    {
        if( Order::where('orderid', $id)->where('paid', false)->count() )
        {
            return true;
        }
        return false;
    }
    protected function calc_data()
    {
        $page = 1;
        $cost = 16;
        $level_factor = 0.95;
        $init_price = floatval( $page * $cost * $level_factor );

        $a = Work::where('is_active', true)->get()->toArray();
        $b = Level::where('is_active', true)->get()->toArray();
        $c = Scale::where('type', 1)->where('is_active', true)->get()->toArray();
        $d = Page::where('is_active', true)->get()->toArray();
        return [ $a, $b, $c, $d, $init_price ];
    }
    protected function trans_no()
    {
        $length = 24;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $arr = str_split($randomString, 6);
        $rtn = $arr[0].'-'.$arr[1].'-'.$arr[2].'-'.$arr[3];
        return $rtn;
    }

}

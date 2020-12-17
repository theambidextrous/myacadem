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

class SeoController extends Controller
{
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
    public function a() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Need Accounting Homework Help ASAP?','subtitle' => 'Let Qualified Experts Make the Work for You!', 'route' => route('a')]);
    }
    public function b() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Need Algebra Homework Help ASAP?','subtitle' => 'Let Qualified Experts Make the Work for You!', 'route' => route('b')]);
    }
    public function c() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Professional Calculus Homework Help in 3 Hours or Less No More Missed Deadlines.','subtitle' => 'Be on Time and Score Better.', 'route' => route('c')]);
    }
    public function d() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Quick Chemistry Homework Help for Any Budget No More Missed Deadlines.','subtitle' => 'Be on Time and Score Better.', 'route' => route('d')]);
    }
    public function e() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Confidential College Homework Help in Just 3 Hours Professional Writers Will Help You Meet the Deadline No Matter What!','subtitle' => '', 'route' => route('e')]);
    }
    public function f() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Computer Science Homework Help: Boost Your Grades Hands-Down Hire a Top-Reviewed Expert in Your Subject.','subtitle' => 'Score better no matter what!', 'route' => route('f')]);
    }
    public function g() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Budget-Friendly Economics Homework Help You’ll Love Rely on Our Timely Assistance and Worry No More!','subtitle' => '', 'route' => route('g')]);
    }
    public function h() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Professional Excel Homework Help: Any Subject, Any Deadline Hire a Top-Reviewed Expert in Your Subject.','subtitle' => 'Score better no matter what!', 'route' => route('h')]);
    }
    public function i() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Looking for Finance Homework Help ASAP?','subtitle' => 'Rely on Our Timely Assistance and Worry No More!', 'route' => route('i')]);
    }
    public function j() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Pro Geometry Homework Help Approved by 40K Students Nothing Should Stop You From Getting the Best Grade for Your Assignment.','subtitle' => '', 'route' => route('j')]);
    }
    public function k() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Pro Java Homework Help of Top-Notch Quality Nothing Should Stop You From Getting the Best Grade for Your Assignment.','subtitle' => '', 'route' => route('k')]);
    }
    public function l() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Looking for Trustworthy Physics Homework Helper? Look No Further!','subtitle' => 'Hire a Pro Expert Here and Relax', 'route' => route('l')]);
    }
    public function m() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Programming Assignment Help for Students Who Value Quality Great Quality Isn’t a Promise Here.','subtitle' => 'It Is a Rock-Solid Guarantee', 'route' => route('m')]);
    }
    public function n() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Science Homework Helper You’ll Love to Work with Professional Online Assistance With Any Assignment 24/7.','subtitle' => '', 'route' => route('n')]);
    }
    public function o() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Statistics Homework Helper You’ll Love to Work with Professional Online Assistance With Any Assignment 24/7.','subtitle' => '', 'route' => route('o')]);
    }
    public function p() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Native Spanish Homework Helper You Can Rely on Hire a Top-Reviewed Expert in Just 3 Minutes.', 'subtitle' => 'Get the Work Done in Just 3 Hours', 'route' => route('p')]);
    }
    public function q() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'History Homework Help You Can Rely on We’ve Helped Thousands of Students Achieve Their Academic Goals.', 'subtitle' => 'You\'re Next ', 'route' => route('q')]);
    }
    public function r() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'French Homework Help You Can Rely on We’ve Helped Thousands of Students Achieve Their Academic Goals.', 'subtitle' => 'You\'re Next ', 'route' => route('r')]);
    }
    public function s() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'English Homework Help You Can Rely on We’ve Helped Thousands of Students Achieve Their Academic Goals.', 'subtitle' => 'You\'re Next ', 'route' => route('s')]);
    }
    public function t() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Need Help with C++ Homework ASAP?', 'subtitle' => 'You Got It! Hire an Expert and Relax', 'route' => route('t')]);
    }
    public function u() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Biology Homework Help for Students Who Value Quality Great Quality Isn’t a Promise Here.', 'subtitle' => 'It Is a Rock-Solid Guarantee', 'route' => route('u')]);
    }
    public function v() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Social Studies Homework Help: 100% Originality & Quality Hire an Expert and Take a Well-Deserved Break.', 'subtitle' => 'You’re in Safe Hands Now', 'route' => route('v')]);
    }
    public function w() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Python Homework Help: Fast, Simple, and Affordable Let a Professional Handle the Assignment for You.', 'subtitle' => 'Sit Back. Score Better.', 'route' => route('w')]);
    }
    public function x() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Psychology Homework Help: 100% Originality & Quality Hire an Expert and Take a Well-Deserved Break.', 'subtitle' => 'You’re in Safe Hands Now.', 'route' => route('x')]);
    }
    public function y() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Precalculus Homework Help: Fast, Simple, and Affordable Let a Professional Handle the Assignment for You.', 'subtitle' => 'Sit Back. Score Better.', 'route' => route('y')]);
    }
    public function z() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Philosophy Homework Help of Excellent Quality Hire a Professional Writer to Handle the Job for You.', 'subtitle' => 'Do Nothing. Perform Better', 'route' => route('z')]);
    }
    public function aa() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Matlab Homework Help of Excellent Quality Hire a Professional Writer to Handle the Job for You.', 'subtitle' => 'Do Nothing. Perform Better', 'route' => route('aa')]);
    }
    public function bb() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Pro Math Homework Help Online 24/7 In a Time Crunch?', 'subtitle' => 'Not Anymore! We’ll Help You Meet the Deadline.', 'route' => route('bb')]);
    }
    public function cc() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => '24/7 Homework Help for High School In a Time Crunch?', 'subtitle' => 'Not Anymore! We’ll Help You Meet the Deadline.', 'route' => route('cc')]);
    }
    public function dd() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Engineering Homework Help Approved by 40K Students Improving GPA is easy and safe with us.', 'subtitle' => '', 'route' => route('dd')]);
    }
    public function ee() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Order Coding Homework Help and Relax Enjoy Your Life.', 'subtitle' => 'Our Qualified Experts Will Take Care of the Rest', 'route' => route('ee')]);
    }
    public function ff() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Last-Minute School Homework Help of Excellent Quality Top-Reviewed Writers Are at Your Service 24/7.', 'subtitle' => 'Hire an Expert and Relax.', 'route' => route('ff')]);
    }
    public function gg() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Last-Minute CPM Homework Help of Great Quality Professional Writers Will Help You Meet the Deadline No Matter What!', 'subtitle' => '', 'route' => route('gg')]);
    }
    public function hh() 
    {
        return view('seo', [ 'calc_data' => $this->calc_data(), 'title' => 'Need Homework Answers ASAP?', 'subtitle' => 'Let a Professional Handle Your Problem Timely and to the Point.', 'route' => route('hh')]);
    }

    
}

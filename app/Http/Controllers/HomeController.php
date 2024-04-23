<?php

namespace App\Http\Controllers;

use App\Http\Controllers\backnend\BackendBaseController;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends BackendBaseController
{

    protected $route ='home';
    protected $panel ='Dashboard';
    protected $view ='home';
    protected $title;
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

        $data['row']=Blog::where('status',1)->get();
        return view('frontend.user.firstuserHome',compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $this->title='Admin';
//        $data['admin']=User::where('type',3)->count();
//        $data['blog']=Blog::count();
        $data['user']=User::all()->count();
//        dd();

        return view($this->__loadDataToView('backend.adminHome'),compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function seconduserHome()
//    {
//        $data['row']=Blog::where('status',1)->get();
//        return view('frontend.user.seconduserHome',compact('data'));
//    }
//    public function thirduserHome()
//    {
//        $data['row']=Blog::where('status',1)->get();
//        return view('frontend.user.thirduserHom',compact('data'));
//    }
}

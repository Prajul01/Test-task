<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogPostView;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontBaseController extends Controller
{
    public function main(){


        $data['row']=Blog::where('status',1)->get();

        return view('frontend.user.firstuserHome', compact('data'));
//        dd($data['row']);
    }

    public function single($id){
        $data['blog']=Blog::where('id', $id)->first();
        BlogPostView::create([
            'user_id' => auth()->id(),
            'blog_id' => $id,
            'viewed_at'=>Carbon::now()
        ]);
//        $data['views'] = User_Blog::where('user_id',Auth::user()->id)->count();


//        $data['blog']=Blog::where('id', $id)->get();

        return view('frontend.single',compact('data'));
    }
}

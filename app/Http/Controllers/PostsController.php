<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $id = Auth::id();

        $users = DB::table('users')
        ->where('id',$id)
        ->first();

        $follow = DB::table('follows')
        ->where('follower',$id)
        ->count();

        $follower = DB::table('follows')
        ->where('follow',$id)
        ->count();

        $posts = DB::table('users')
        ->Join('posts','users.id','=','posts.user_id')
        ->leftJoin('follows','users.id','=','follows.follow')
        ->select('posts.post','users.username','posts.created_at','posts.id','users.images')
        ->where('follows.follower',$id)
        ->orWhere('user_id',$id)
        ->groupBy('posts.id')
        ->orderBy('posts.created_at','desc')
        ->get();

        return view('posts.index',compact('users','follow','follower','posts'));
    }

    public function upPost(){



       }





}

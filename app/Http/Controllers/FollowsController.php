<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function followList(){

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


        $follow_id = DB::table('follows')
        ->where('follower',$id)
        ->pluck('follow');


        $follows = DB::table('users')
        ->Join('posts','users.id','=','posts.user_id')
        ->whereIn('posts.user_id',$follow_id)
        ->select('')
        ->get();

        return view('follows.followList',compact('follows'));
    }

    public function followerList(){

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

        $followers = DB::table('posts')
        ->leftJoin('users','posts.user_id','=','users.id')
        ->Join('follows','users.id','=','follows.follower')
        ->where('follows.follow',$id)
        ->select('posts.*','users.username','users.bio','users.images')
        ->get();


        return view('follows.followerList',compact('users','follow','follower','followers'));
    }
}

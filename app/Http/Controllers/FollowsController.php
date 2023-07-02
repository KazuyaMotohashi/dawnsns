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

        $follows = DB::table('posts')
        ->leftJoin('users','posts.user_id','=','users.id')
        ->whereIn('users.id',$follow_id)
        ->select('posts.post','posts.created_at','posts.user_id','users.id','users.username','users.bio','users.images')
        ->get();

        $icons = Db::table('users')
        ->whereIn('id',$follow_id)
        ->select('id','images')
        ->get();

        return view('follows.followList',compact('users','follows','follower','follow','icons'));
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

        $followers = DB::table('users')
        ->leftJoin('posts','users.id','=','posts.user_id')
        ->leftJoin('follows','users.id','=','follows.follower')
        ->where('follows.follow',auth::id())
        ->groupBy('users.id')
        ->select('posts.post','posts.created_at','users.id','users.username','users.bio','users.images')
        ->get();


        return view('follows.followerList',compact('users','follow','follower','followers'));
    }

     public function addFollow($id){

        $userId = Auth::id();

         DB::table('follows')
        ->insert([
            'follow'=>$id,
            'follower'=>$userId,
        ]);

       return back();
    }

    public function deleteFollow($id){

        $userId = Auth::id();

        DB::table('follows')
        ->where([
            ['follow','=',$id],
            ['follower','=',$userId]])
        ->delete();

        return redirect()->route('profile',['id'=>$id]);
    }

}

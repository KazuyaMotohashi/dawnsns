<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function profile($id){

        $usersId = Auth::id();

        $users = DB::table('users')
        ->where('id',$usersId)
        ->first();

        $follow = DB::table('follows')
        ->where('follower',$usersId)
        ->count();

        $follower = DB::table('follows')
        ->where('follow',$usersId)
        ->count();

        $posts = DB::table('users')
        ->join('posts','users.id','=','posts.user_id')
        ->where('posts.user_id',$id)
        ->select('posts.*','users.username','users.images','users.bio')
        ->orderBy('created_at','desc')
        ->get();

        $userInformation = DB::table('users')
        ->where('id',$id)
        ->first();

        $status =DB::table('follows')
        ->where('follow','=',$id)
        ->get();

        dd($status);

        return view('users.profile',compact('users','follow','follower','posts','userInformation','status'));
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

        return back();
    }

    public function search(){

        $allUser = Db::table('users')
        ->select('username','images')
        ->get();

        return view('users.search');
    }
}

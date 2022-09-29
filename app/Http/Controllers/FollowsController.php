<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function followList(){

         $id = $request->input('id');

        $follows = DB::table('users')
        ->join('posts','users.id','=','posts.users.id')
        ->leftJoin('follows','users.id','=','follows.follow')
        ->select('users.*','follows.*','posts,*')
        ->where('id',$id)
        ->get();

        return view('follows.followList');
    }

    public function followerList(){

        $id = $request->input('id');

        $followers = DB::table('users')
        ->join('posts','users.id','=','posts.users.id')
        ->leftJoin('follows','users.id','=','follows.follow')
        ->select('users.*','follows.*','posts,*')
        ->where('id',$id)
        ->get();

        return view('follows.followerList');
    }
}

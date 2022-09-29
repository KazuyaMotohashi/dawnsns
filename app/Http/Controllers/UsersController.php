<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function profile($id){

        $users = DB::table('users')
        ->where('id',$id)
        ->first();

        $posts = DB::table('posts')
        ->where('id',$id)
        ->orderBy('created_at','desc')
        ->get();

        return view('users.profile',compact('posts'));
    }

    public function search(){

        return view('users.search');
    }
}

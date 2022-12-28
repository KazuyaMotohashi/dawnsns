<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct(){
    $this->middleware(function($request,$next){

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

        View::share('user',$users);
        View::share('follow',$follow);
        View::share('follower',$follower);


        return $next($request);
        });

    }


}

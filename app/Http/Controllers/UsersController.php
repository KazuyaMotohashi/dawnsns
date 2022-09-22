<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function profile(){

        return view('users.profile');
    }

    public function search(){

        return view('users.search');
    }
}

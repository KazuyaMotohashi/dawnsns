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
        ->where('follows.follower',$id)
        ->orWhere('user_id',$id)
        ->select('posts.*','users.username','users.images')
        ->groupBy('posts.id')
        ->orderBy('posts.created_at','desc')
        ->get();

        return view('posts.index',compact('users','follow','follower','posts'));
    }

    public function create(Request $request)
    {
        $id = Auth::id();

        $post = $request->input('newPost');
        DB::table('posts')
        ->insert([
            'user_id'=>$id,
            'post'=>$post,
            'created_at'=>now(),
        ]);

        return redirect('/top');
    }

    public function updateForm($id)
    {
      $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', compact('post'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $up_post]);

        return redirect('/index');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    public function profile(){

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

        return view('posts.profile',compact('users','follow','follower'));

    }

    public function edit(Request $request){

        $id = $request->input('id');
        $up_profile = $request->input('upProfile');
        DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $username,
                'mail' => $mail,
                'password' => $newPassword,
                'bio' => $bio,
                'image' => $images
            ]);


        return view('/top',compact('up_profile'));
    }




}

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

    public function update($id, Request $request)
    {

        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $up_post]);

        return redirect('/top');
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

        $id = Auth::id();
        $username = $request->input('username');
        $mail = $request->input('mail');
        $bio = $request->input('bio');

        if(request('newPassword')){
            $password = $request->input('newPassword');
        }else{
            $password = DB::table('users')
            ->where('id', $id)
            ->value('password');
           }

        if(request('images')){
            $image_name = $request->file('images')->getClientOriginalName();
            $request->file('images')->storeAs('public/images',$image_name);
        }else{
            $image_name = DB::table('users')
            ->where('id', $id)
            ->value('images');
        }

        DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $username,
                'mail' => $mail,
                'password' => $password,
                'bio' => $bio,
                'images' => $image_name,
            ]);

        return back();
    }




}

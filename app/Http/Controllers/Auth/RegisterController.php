<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use app\Validators\CustomValidators;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data,
        [
            'username' => 'required|string|between:4,12',
            'mail' => 'required|string|email|unique:users',
            'password' => 'required|alpha_num|between:4,12|confirmed|unique:users',
            'password_confirmation' => 'required|alpha_num|same:password'
        ],
        [
            'username.required' =>'必須項目です',
            'username.between' =>'4文字以上12文字以下で入力してください',
            'mail.required' =>'必須項目です',
            'mail.email' => '正しいメールアドレスを入力してください',
            'mail.unique' => '既に使用されているメールアドレスです',
            'password.required' =>'必須項目です',
            'password.between' =>'4文字以上12文字以下で入力してください',
            'password.unique' => '既に使用されているパスワードです',
            'password.alpha_num' => '半角英数字で入力してください',
            'password_confirmation.required' =>'必須項目です',
            'password_confirmation.alpha_num' => '半角英数字で入力してください',
            'password_confirmation.same' => 'パスワードが一致していません'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $val = $this -> validator($data);
            if($val->fails()){
                return redirect('/register')
                -> withErrors($val);
            } else {
            $this -> create($data);
            return redirect('added') -> with('username',$data['username']);
            }
         }
        return view('auth.register');
    }

    /**
 * 定義済みバリデーションルールのエラーメッセージ取得
 *
 * @return array
 */
public function messages()
{
    return [
        'title.required' => 'A title is required',
        'body.required'  => 'A message is required',
    ];
}


    public function added(){
        return view('auth.added');
    }
}

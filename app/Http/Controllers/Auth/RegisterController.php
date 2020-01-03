<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:30',
            'details' => 'required|string|max:800',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => '名前は必ず入力してください',
            'name.max' => '名前は30字以下で入力してください',
            'details.required' => '企業詳細は必ず入力してください',
            'details.max' => '企業詳細は800字以下で入力してください',
            'email.required' => 'メールアドレスは必ず入力してください',
            'email.max' => 'メールアドレスは255字以下で入力してください',
            'email.unique' => '入力したメールアドレスはすでに登録済みです',
            'password.required' => 'パスワードは必ず入力してください',
            'password.min' => 'パスワードは6字以上で入力してください',
            'password.confirmed' => 'パスワード確認がパスワードと一致していません',
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
            'name' => $data['name'],
            'details' => $data['details'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

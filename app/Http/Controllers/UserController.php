<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use Redirect;
use Hash;
use URL;
class UserController extends Controller
{
  /**
  * Display login.
  *
  * @return \Illuminate\Http\Response
  */
  public function showLogin()
  {
    if (Auth::check()) {
      return Redirect::route('backend.dashboard');
    }
    return view('backend.account.login');
  }

  /**
   * Login login
   * @param Request $request
   * @return type
   */
  public function postLogin(Request $request){
    //Check Validator
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required',
    ],[
      'email.required' => '名前を入力してください。',
      'password.required' => 'パスワードを入力してください。'
    ]);

    //Check remember value
    $remember = ($request->has('remember'))? true:false;
    $auth = Auth::attempt(['email' =>$request->email,'password' =>$request->password], $remember);
    //if login success
    if($auth){
        \Session::flash('flash_message','ログインに成功しました。');
        return Redirect::route('backend.dashboard');
    }
    return Redirect::route('backend.account.login')
            ->withInput()
            ->with('global','ログインできません（email またはパスワードが異なります）');
  }
  /**
  * Logout Logic
  * @return type
  */
  public function logout(){
      Auth::logout();
      return Redirect::route('backend.account.login');
  }
}

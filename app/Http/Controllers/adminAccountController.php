<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Validator;
use Redirect;
use Hash;
use URL;
class adminAccountController extends Controller
{
  public function __construct(User $user){
    $this->_user = $user;
  }
  /**
  * create admin account
  * @return $request
  */
  public function createAccount()
  {
    return view('backend.account.create');
  }
  public function storeAccount(Request $request)
  {
    $values = $request->all();
    $rules = $this->_user->userRules();
    $validator = \Validator::make($values,$rules,$this->_user->userErrorMessages());
    if ($validator->fails()) {
       return redirect()->back()->withErrors($validator);
    } else {
      // table user
      $value["name"] = $request->name;
      $value["email"] = $request->email;
      $value["password"] = bcrypt($request->password);
      $data = User::create($value);
      \Session::flash('flash_message',$data->name .' save successfully.');
    }
    return redirect()->route('backend.dashboard');
  }
}

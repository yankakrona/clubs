<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
  * Validator Resgister
  */
  public function userRules()
  {
    return  [
      "name" => "required|max:255",
      "email" => "required|email|max:200|unique:users,email",
      // Validator password
      "password" => "required|min:4|max:10|confirmed",
      "password_confirmation" => "required|min:4|max:10",
    ];
  }
  /**
  * 修理依頼内容の入力のバリデーションのエラーメッセージ
  */
  public function userErrorMessages()
  {
    return  [
      'name.required' => '担当者名の入力は必須です。',
      'name.max' => ':max指定文字数を超える入力は行えない',
      'email.required' => 'メールアドレス1の入力は必須です。',
      'email.max' => ':max指定文字数を超える入力は行えない。',
      'email.email' => 'メールアドレス1の形式が不正です。',
      'email.unique' => 'メールアドレスはすでに取得済みです。　',
      // Validator password
      'password.confirmed' => 'パスワードが一致しません。',
      'password.required'  => 'パスワードの入力は必須です。',
      'password.min'  => 'パスワードは半角、4〜10文字で指定してください。',
      'password.max'  => 'パスワードは半角、4〜10文字で指定してください。',
      'password_confirmation.required'  => '新しいパスワード（再入力）は必要です。',
      'password_confirmation.min'  => '新しいパスワード（再入力）は４文字以上を入力して下さい。',
      'password_confirmation.max'  => '新しいパスワード（再入力）は１０文字まで入力して下さい。'
    ];
  }
}

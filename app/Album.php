<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
  */
  protected $table = 'album_girl';
  protected $primaryKey = 'album_id';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'album_id','girl_id', 'photos','created_at','updated_at'
  ];
  /**===========================
  * Validator information girl
  ==============================*/
  public function AlbumRules()
  {
    return [
      'girl_lists'  => 'required',
    ];
  }
  public function albumErrorMessages()
  {
    return [
      'girl_lists.required' => 'Girl nameの入力を行ってください。',
    ];
  }
  public function girl()
  {
      return $this->belongsTo('App\Girl');
  }
  // get value id and name from Table album_id
  public function getGirlIdName()
  {
    return \App\Girl::pluck('girl_name','girl_id')->all();
  }
}

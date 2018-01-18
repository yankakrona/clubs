<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use DateTime;
use DateTimeZone;
use App\GirlHistory;
class Girl extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'girl';
  protected $primaryKey = 'girl_id';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'girl_name', 'age', 'birthday','pob','hobby','cigarette_flag','characteristic_type',
      'chorm_point','profile_girl','work_flag','deleted_flag','created_at','updated_at'
  ];
  /**--------------------------------------
  * Validator information girl
  ----------------------------------------*/
  public function girlRules()
  {
    return [
      'girl_name'  => 'required|string|max:255',
      'birthday'  => 'required|check_date',
      'pob'  => 'required',
      'cigarette_flag'  => 'required',
      'characteristic_type' => 'required',
      'profile_girl' => 'mimes:jpeg,png,jpg|max:10240',
    ];
  }
  public function girlErrorMessages()
  {
    return [
      'girl_name.required' => 'Girl nameの入力を行ってください。',
      'girl_name.max' =>  'girl name:max文字を超えてはいけません。',
      'birthday.required'  =>  'birthdayの入力を行ってください。',
      'pob.required'  => 'pobの入力を行ってください。',
      'cigarette_flag.required' => 'cigaretteの入力を行ってください。',
      'characteristic_type.required' => 'characteristic の入力を行ってください。',
      'profile_girl.mimes'  =>  'please, enter image extention jpeg,png,jpg',
    ];
  }
  /**--------------------------------------
  * get sql for Dashboard
  ----------------------------------------*/
  public function getWorkRank(){
    if(!Auth::check()){
      return null;
    }
    return $this->sqlCountRank();
  }
  public function getTotalworkToday(){
    if(!Auth::check()){
      return null;
    }
    return $this->sqlTotalWorkToday();
  }
  public function getTotalnoWorkToday(){
    if(!Auth::check()){
      return null;
    }
    return $this->sqlTotalnoWorkToday();
  }
  /**--------------------------------------
  * SQl for Dashboard
  ----------------------------------------*/
  /**
   * Sql count rank work's girl
   * @param $sqlCountRank
   * @return $sql
   */
   public function sqlCountRank()
   {
    $sql = DB::table('girl AS G')
          ->Join('girl_history AS GH', 'G.girl_id', '=', 'GH.girl_id')
          ->select(DB::raw('G.girl_name'),DB::raw('COUNT(*) as total_work'))
          ->where('GH.work_flag', '=', 1)
          ->Where('G.work_flag', '=', 1)
          ->orderBy('total_work', 'DESC')
          ->groupBy('G.girl_name')->limit(10)->get();
     return $sql;
   }
  /**
  * Sql count rank work's girl
  * @param $sqlCountRank
  * @return $sql
  */
  public function sqlTotalWorkToday()
  {
   $sql = DB::table('girl AS G')
        ->select('G.girl_name', 'G.work_flag','profile_girl')
        ->Where(DB::raw("DATE_FORMAT(G.updated_at,'%Y-%m-%d')"), '=', date("Y-m-d"))
        ->where('G.work_flag', '=', 1)
        ->get();
    return $sql;
  }
  /**
  * Sql count rank work's girl
  * @param $sqlCountRank
  * @return $sql
  */
  public function sqlTotalnoWorkToday()
  {
   $sql = DB::table('girl AS G')
        ->select('G.girl_name', 'G.work_flag')
        ->Where(DB::raw("DATE_FORMAT(G.updated_at,'%Y-%m-%d')"), '=', date("Y-m-d"))
        ->where('G.work_flag', '=', 0)
        ->get();
    return $sql;
  }
}

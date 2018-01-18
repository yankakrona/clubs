<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Girl;
class GirlHistory extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
  */
  protected $table = 'girl_history';
  protected $primaryKey = 'girl_history_id';
  public $timestamps = false;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'girl_id','work_flag','work_date'
  ];
  /**
  * Sql count rank work's girl
  * @param $sqlCountRank
  * @return $sql
  */
  public function SQL_SELECT_GIRL()
  {
   $sql = DB::table('girl AS G')
        ->select('G.girl_id', 'updated_at')
        ->Where(DB::raw("DATE_FORMAT(G.updated_at,'%Y-%m-%d')"), '=', date("Y-m-d"))
        ->where('G.deleted_flag', '=', 0)
        ->get()->toArray();
    return $sql;
  }
}

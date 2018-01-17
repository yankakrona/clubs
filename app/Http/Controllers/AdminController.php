<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Girl;
use App\GirlHistory;
class AdminController extends Controller
{
  public function __construct(Girl $model){
    $this->model = $model;
  }
  /**
  * create a new controller instance
  * Display Dashboard
  * @return void
  */
  public function dashboard(Request $request)
  {
    $rank_works = $this->model->getWorkRank();
    $work_todays = $this->model->getTotalworkToday();
    $noWork_todays = $this->model->getTotalnoWorkToday();
    return view('backend.dashboard.index',compact('rank_works','work_todays','noWork_todays'));
  }
  /**
  * create a new controller instance
  * Display Dashboard
  * @return void
  */
  public function searchWork(Request $request)
  {
    $sqlSearch = DB::table('girl AS G')
         ->Where('deleted_flag','=','0')
         ->Where(DB::raw("DATE_FORMAT(G.updated_at,'%Y-%m-%d')"), '=', date("Y-m-d"))
         ->Where('G.all_flag', '=', $request->flag)
         ->select('G.girl_name', 'G.all_flag','profile_girl')
         ->get();
    return response()->json($sqlSearch);
  }
}

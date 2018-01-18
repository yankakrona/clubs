<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use DB;
use App\Girl;
use App\Album;

class LayoutViewController extends Controller
{
  /*
  * Sql view Girls
  *
  */
  public function sqlListGirl()
  {
    return Girl::where('deleted_flag','=','0')->orderBy('work_flag','DESC')->orderBy('updated_at','DESC');
  }
  /**
   * View home page
   *
   * @param  int  $request
   * @return \Illuminate\Http\Response
   */
  public function showHome(Request $request)
  {
    $girls   = $this->sqlListGirl()->paginate(12);
    return view('home',compact('girls'));
  }
  /**
   * sigle post home page
   *
   * @param  int  $request
   * @return \Illuminate\Http\Response
   */
  public function singlePost(Request $request, $girl_name)
  {

    $girls	 = Girl::where("girl_name", "=", $girl_name)->get()->toArray();
    if(count($girls) > 0){
      $girl_id =  $girls[0]['girl_id'];
      $albums	 = Album::where("girl_id", "=", $girl_id)->get()->toArray();
      $count_album   = count($albums);
      return view('girl.singlePost',compact('girls','albums','count_album'));
    }else{
      return abort(404);
    }

  }
  /**
   * View all page
   *
   * @param  int  $request
   * @return \Illuminate\Http\Response
   */
  public function pageIchiran(Request $request)
  {
    $girls   = $this->sqlListGirl()->paginate(18);
    return view('pages.ichiran', compact('girls'));
  }
  public function pageRyokinshisutemu(Request $request)
  {
    return view('pages.ryokinshisutemu');
  }
  public function pageAkusesu(Request $request)
  {
    return view('pages.akusesu');
  }
  public function pageKyujinjoho(Request $request)
  {
    return view('pages.kyujinjoho');
  }
  public function pageGuruputenpo(Request $request)
  {
    return view('pages.guruputenpo');
  }

}

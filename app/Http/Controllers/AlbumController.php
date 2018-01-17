<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Redirect;
use Validator;
use Auth;
use Input;
use Mail;
use App\RequestData;
use Session;
use Storage;
Use DB;
Use App\Album;

class AlbumController extends Controller
{
  /**
  * @parm $album
  * call contstruct class Girl
  */
  public function __construct(Album $album)
  {
    $this->_album = $album;
  }
  /**
  * create a new controller instance
  * Display list's girl
  * @return $request
  */
  public function createData()
  {
    $list_arr = $this->_album->getGirlIdName();
    return view('backend.album.create', compact('list_arr'));
  }
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
 public function storeData(Request $request)
 {
   $values = $request->all();
   $rules = $this->_album->albumRules();
   $validator = \Validator::make($values,$rules,$this->_album->albumErrorMessages());
   if ($validator->fails()) {
      return redirect()->back()->withErrors($validator);
   } else {
      if($request->photos == null){
        return Redirect::route('backend.album.create')
                ->withInput()
                ->with('global','please, upload images!');
      }else{
        foreach ($request->photos as $photo) {
          $data['girl_id'] = $request->get('girl_lists');
          if ($request->hasFile('photos')) {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/album-girl/'.date('Ym').'/';
            $dbpath = 'uploads/album-girl/'.date('Ym').'/';
            $orname= $photo->getClientOriginalName();
            $filename =  date('Ym')."-".$orname;
            $photo->move($destinationPath, $filename);
            $data['photos'] = $dbpath.$filename;
          }
          $album = Album::create($data);
        }
        \Session::flash('flash_message','ID00'.$request->get('girl_lists') .'saved album photos successfully.');
        return redirect()->route('backend.girl.index');
      }
    }
 }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use Validator;
use Auth;
use Input;
use Mail;
use App\RequestData;
use Session;
use Storage;
Use DB;
use App\Girl;

class GirlController extends Controller
{
  /**
  * @parm $girl
  * call contstruct class Girl
  */
  public function __construct(Girl $girl)
  {
    $this->_girl = $girl;
  }
  /**
  * create a new controller instance
  * Display list's girl
  * @return $request
  */
  public function showList(Request $request)
  {
    $search = $request->get('search');
    $girls   = Girl::where('girl_name', 'LIKE', '%'.$search.'%')
            ->where('deleted_flag','=','0')
            ->orderBy('all_flag','DESC')->orderBy('created_at','DESC')->paginate(15);
    return view('backend.girl.index', compact('girls', 'search'));

  }
  /**
  * create a new controller instance
  * Display Dashboard
  * @return void
  */
  public function createData()
  {
    return view('backend.girl.create');
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
   $rules = $this->_girl->girlRules();
   $validator = \Validator::make($values,$rules,$this->_girl->girlErrorMessages());
   if ($validator->fails()) {
      return redirect()->back()->withErrors($validator);
   } else {
       $data['girl_name'] = preg_replace('/\s+/', '-', $request->girl_name);
       $data['age'] = (date("Y") - $request->birthday_year);
       $data['birthday'] = date('Y-m-d', strtotime(str_replace('-', '/', $request->birthday)));
       $data['pob'] = $request->pob;
       $data['hobby'] = $request->hobby;
       $data['cigarette_flag'] = $request->cigarette_flag;
       $data['characteristic_type'] = $request->characteristic_type;
       $data['chorm_point'] = $request->chorm_point;
       if ($request->hasFile('profile_girl')) {
           $file = $request->file('profile_girl');
           $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/girl/'.date('Ym').'/';
           $dbpath = 'uploads/girl/'.date('Ym').'/';
           $orname= $file->getClientOriginalName();
           $filename =  date('Ym')."-".$orname;
           $file->move($destinationPath, $filename);
           $data['profile_girl'] = $dbpath.$filename;
       }
       $girl = Girl::create($data);
       \Session::flash('flash_message',$girl->girl_name .'saved successfully.');
   }
   return redirect()->route('backend.girl.index');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $request
   * @return \Illuminate\Http\Response
   */
  public function showDetail(Request $request)
  {
    return view('girl.singlePost');
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function showEdit($id)
  {
      $girl = Girl::findOrFail($id);
      return view('backend.girl.edit', compact('girl'));
  }
  /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, $id)
    {
        $girl = Girl::findOrFail($id);
        $values = $request->all();
        $rules = $this->_girl->girlRules();
        $validator = \Validator::make($values,$rules,$this->_girl->girlErrorMessages());
        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator);
        } else {
            $data['girl_name'] = preg_replace('/\s+/', '-', $request->girl_name);
            $data['age'] = (date("Y") - $request->birthday_year);
            $data['birthday'] = date('Y-m-d', strtotime(str_replace('-', '/', $request->birthday)));
            $data['pob'] = $request->pob;
            $data['hobby'] = $request->hobby;
            $data['cigarette_flag'] = $request->cigarette_flag;
            $data['characteristic_type'] = $request->characteristic_type;
            $data['chorm_point'] = $request->chorm_point;
            $data['updated_at'] = Carbon::now();
            if ($request->hasFile('profile_girl')) {
                $file = $request->file('profile_girl');
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/girl/'.date('Ym').'/';
                $dbpath = 'uploads/girl/'.date('Ym').'/';
                $orname= $file->getClientOriginalName();
                $filename =  date('Ym')."-".$orname;
                $file->move($destinationPath, $filename);
                $data['profile_girl'] = $dbpath.$filename;
            }else{
               $data['profile_girl'] = '';
            }

            $girl->update($data);
            \Session::flash('flash_message',$girl->girl_name .' updated successfully.');
      }
      return redirect()->route('backend.girl.index');
    }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $request
   * @return \Illuminate\Http\Response
   */
  public function destroyData(Request $request)
  {
      // delete girl by id
      $id = $request->girl_id;
      $girl =  Girl::find($id);
      if($girl->deleted_flag == 0){
        $girl->deleted_flag = 1;
        $girl->save();
        \Session::flash('flash_message',$girl->girl_name .'deleted successfully.');
      }
      return redirect()->route('backend.girl.index');

  }
}

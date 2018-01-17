<?php

/*
|-------------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  Route::prefix('admin')->group(function () {
    /*--------------------------------------------------------------------------
    * start Routes for user account
    --------------------------------------------------------------------------*/
    Route::get('/login','UserController@showLogin')->name('backend.account.login');
    Route::post('/login','UserController@postLogin')->name('backend.account.login.post');
    /*--------------------------------------------------------------------------
    * End Routes for user account
    --------------------------------------------------------------------------*/
  });
  /*----------------------------------------------------------------------------
  * Start Group Route middleware auth_user
  ----------------------------------------------------------------------------*/
  Route::group(['middleware' => ['admin']], function () {
    /*--------------------------------------------------------------------------
    * Start prefix namespace for route
    --------------------------------------------------------------------------*/
    Route::prefix('admin')->group(function () {
    /*--------------------------------------------------------------------------
    * start Routes create account user
    --------------------------------------------------------------------------*/
      // create admin account
      Route::get('account/create', 'adminAccountController@createAccount')->name('backend.account.create');
      Route::post('account/create', 'adminAccountController@storeAccount')->name('backend.account.create.post');
      // logout
      Route::post('logout','UserController@logout')->name('backend.account.logout');
    /*--------------------------------------------------------------------------
    * start Routes create account user
    --------------------------------------------------------------------------*/
    /*--------------------------------------------------------------------------
    * start Routes for adminstation
    --------------------------------------------------------------------------*/
      Route::get('dashboard', 'AdminController@dashboard')->name('backend.dashboard');
      Route::post('dashboard', 'AdminController@searchWork')->name('backend.dashboard.search');
      /*------------------------------------------------------------------------
      * Routes for information girl
      ------------------------------------------------------------------------*/
      // show list's girl
      Route::get('girl','GirlController@showList')->name('backend.girl.index');
      // Create information's girl
      Route::get('girl/create','GirlController@createData')->name('backend.girl.create');
      // Save information's girl
      Route::post('girl','GirlController@storeData')->name('backend.girl.store');
      // show information's girl
      Route::get('girl/{girl_name}','GirlController@showDetail')->name('girl.singlePost');
      // Edit information's girl
      Route::get('girl/edit/{id}','GirlController@showEdit')->name('backend.girl.edit');
      // Update information's girl
      Route::patch('girl/edit/{id}','GirlController@updateData')->name('backend.girl.update');
      // Delete information's girl
      Route::post('girl/delete','GirlController@destroyData')->name('backend.girl.deleted');
    /*--------------------------------------------------------------------------
    * Routes for album girl
    --------------------------------------------------------------------------*/
      // Create album's girl
      Route::get('album/create','AlbumController@createData')->name('backend.album.create');
      // Save album's girl
      Route::post('album','AlbumController@storeData')->name('backend.album.store');
    /*--------------------------------------------------------------------------
    * End Routes for adminstation
    --------------------------------------------------------------------------*/
  });
  /*--------------------------------------------------------------------------
  * End prefix namespace for route
  --------------------------------------------------------------------------*/
});
/*------------------------------------------------------------------------------
* End Group Route middleware auth
------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------
* Start Routes for fornt page
------------------------------------------------------------------------------*/
// show home page
Route::get('/','LayoutViewController@showHome')->name('home');
/*--------------------------------------------------------------------------
* Start prefix namespace for route
--------------------------------------------------------------------------*/
Route::prefix('club')->group(function () {
  // show information's girl
  Route::get('girl/{girl_name}','LayoutViewController@singlePost')->name('girl.singlePost');
  // route display pages
  Route::get('ichiran','LayoutViewController@pageIchiran')->name('pages.ichiran');
  Route::get('ryokinshisutemu','LayoutViewController@pageRyokinshisutemu')->name('pages.ryokinshisutemu');
  Route::get('akusesu','LayoutViewController@pageAkusesu')->name('pages.akusesu');
  Route::get('kyujinjoho','LayoutViewController@pageKyujinjoho')->name('pages.kyujinjoho');
  Route::get('guruputenpo','LayoutViewController@pageGuruputenpo')->name('pages.guruputenpo');
});
// show lineAPIcallback
Route::get('/lineAPIcallback','LineBotController@callBackLinBotAPI')->name('lineMessage.callback-api');
/*-----------------------------------------------------------------------------
* End Routes for fornt page
------------------------------------------------------------------------------*/

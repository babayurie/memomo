<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ログイン
Route::get('/home', 'HomeController@index')->name('home');
// 一覧
Route::get('/memos', 'MemoController@index')->name('memos.index');
// 作成
Route::post('/memos', 'MemoController@store')->name('memos.store');
Route::get('/memos/create', 'MemoController@create')->name('memos.create');
// 詳細
Route::get('/memos/detail/{memo}', 'MemoController@show')->name('memos.detail');
// 編集
Route::put('/memos/{memo}', 'MemoController@update')->name('memos.update');
Route::get('/memos/edit/{memo}', 'MemoController@edit')->name('memos.edit');
// 削除
Route::delete('/memos/{memo}', 'MemoController@destroy')->name('memos.delete');
// 検索機能
Route::get('/search', 'MemoController@search')->name('memos.index');
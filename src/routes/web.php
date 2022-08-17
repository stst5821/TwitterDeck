<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(); 

// 記事系
Route::name('articles.')->group(function () {
  // 一覧、詳細
  Route::get('/', 'ArticleController@index')->name('index');
  Route::get('/articles/{article}', 'ArticleController@show')->name('show');

  // 作成
  Route::get('/articles/create', 'ArticleController@create')->name('create');
  Route::post('/articles', 'ArticleController@store')->name('store');

  // 編集
  Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('edit');
  Route::post('/articles/{article}', 'ArticleController@update')->name('update');

  // 削除
  Route::delete('/articles/{article}', 'ArticleController@destroy')->name('destroy');
});
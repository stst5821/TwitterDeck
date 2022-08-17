<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(); 

// 記事系
Route::name('articles.')->group(function () {
  // 一覧
  Route::get('/', 'ArticleController@index')->name('index');

  Route::middleware(['auth'])->group(function () {
    // 作成
    Route::get('/articles/create', 'ArticleController@create')->name('create');
    Route::post('/articles', 'ArticleController@store')->name('store');

    // 詳細
    Route::get('/articles/{article}', 'ArticleController@show')->name('show');

    // 編集
    Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('edit');
    Route::PATCH('/articles/{article}', 'ArticleController@update')->name('update');

    // 削除
    Route::delete('/articles/{article}', 'ArticleController@destroy')->name('destroy');
  });
});
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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/list','AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create','AdminCategoryController@store');
        Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}','AdminCategoryController@update');
        Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.get.action.category');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/list','AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create','AdminProductController@store');
        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/update/{id}','AdminProductController@update');
        Route::get('/{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
    });

    Route::group(['prefix' => 'article'], function () {
        Route::get('/list','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/update/{id}','AdminArticleController@update');
        Route::get('/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');
    });

    //Order transaction manager
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');

    });

    //User manager
    Route::group(['prefix' => 'user'], function () {
        Route::get('/','AdminUserController@index')->name('admin.get.list.user');
    });
});

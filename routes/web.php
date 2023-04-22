<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
   return view('welcome');
}); */

// ログインしていない状態で管理画面にアクセスしようとしたときに、ログイン画面にリダイレクト。middleware以下追記
use App\Http\Controllers\Admin\NewsController;
/*Route::controller(NewsController::class)->prefix('admin')->group(function() {
    Route::get('news/create', 'add')->middleware('auth');
}); */

Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');
});

// 課題3 (04 Routingについて理解する)
/*Route::controller(AAAController::class)->prefix('admin')->group(function() {
    Route::get('bbb', 'Action');
}); */

use App\Http\Controllers\Admin\ProfileController;

// 課題2.3 (07 ユーザ認証を実装する)
// ログインしていない状態で管理画面にアクセスしようとしたときに、ログイン画面にリダイレクト。middleware以下追記
/* Route::controller(ProfileController::class)->prefix('admin')->group(function() {
    Route::get('profile/create', 'add')->middleware('auth');
    Route::get('profile/edit', 'edit')->middleware('auth');
}); */

// 課題6 (08 ニュース投稿画面を作成しよう)
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
   // Route::get('profile/create', 'add')->middleware('auth');
   // Route::get('profile/edit', 'edit')->middleware('auth');
   
   Route::get('profile/create', 'add')->name('profile.add');
   Route::post('profile/create', 'create')->name('profile.create');
   //Route::post('profile/edit', 'edit')->name('profile.edit');
   Route::post('profile/edit', 'update')->name('profile.update');
   Route::get('profile', 'index')->name('profile.index');
   // 追加
   Route::get('profile/edit', 'edit')->name('profile.edit');
   Route::get('profile/delete', 'delete')->name('profile.delete');
});
  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;
Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');

use App\Http\Controllers\ProfileController as PublicProfileController;
Route::get('/profile', [PublicProfileController::class, 'index'])->name('profile.index');


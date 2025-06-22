<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

Route::group(['middleware'=>['auth']],function () {
  Route::get('top', [PostsController::class, 'index'])->name('top.show');

  //更新ページ表示
  Route::get('profile', [ProfileController::class, 'index']);
  //更新処理
  Route::post('update_form',[ProfileController::class,'update']);

  // 検索処理
  Route::get('search', [UsersController::class, 'index']);

  //フォローリスト　フォロー一覧表示
  Route::get('follow-list', [PostsController::class, 'followShow']);

  //フォロワーリスト
  Route::get('follower-list', [PostsController::class, 'followerShow']);

  // ログアウト実装
  Route::get('logout',[PostsController::class,'logout']);

  //検索リスト
  Route::get('search',[UsersController::class,'search']);
  Route::post('search',[UsersController::class,'search']);

  //ポストを作成
  Route::post('/post_create',[PostsController::class,'create']);
  //ポストを編集
  Route::Get('/{id}/update',[PostsController::class,'update']);
  Route::get('/{id}/delete',[PostsController::class,'delete']);

});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;


class UsersController extends Controller
{

//ユーザー検索画面
    public function search(Request $request){
        // 検索ワード
        $keyword = $request->input('search_name');
        if (!empty($keyword)) {
            // 検索ワードが入っていたら実行
            $all_users = User::where('username','like','%'.$keyword.'%')
            ->whereNotIn('id', [Auth::id()])
            ->latest()
            ->get();
        } else {
            // ユーザー全てを取得
            $all_users=User::whereNotIn('id', [Auth::id()])->latest()->get();
        }
        // 検索ワードと検索データを画面に渡す
        return view('users.search',
        ['all_users'=>$all_users,
    'search_name'=>$request->search_name]);
    }

//ユーザーのプロフィール画面
    public function profile ($id) {
        // ユーザーテーブルからデータを抽出
        $follow_data = User::find($id);
        // ポストテーブルからデータを抽出
        $follow_post = Post::Where('user_id',$id)
        ->latest('updated_at')
        ->get();

        // コンパクト関数で、2種類のデータをビューに送る
        return view('users.userprofile',compact('follow_data','follow_post'));
    }


// フォローしている人一覧を表示する
public function followShow(){
    // フォローしている人のデータを出す。
    $follow = Auth::user()->followers->pluck('id');

    $follow_data = User::WhereIn('id',$follow)
    ->limit(20)
    ->get();

    $follow_post = Post::WhereIn('user_id',$follow)
    ->latest('updated_at')
    ->get();

    return view('follows.followList',compact('follow_data','follow_post'));
}


// フォローしてくれている人一覧を表示する
public function followerShow(){
    // フォローしてくれている人のデータを出す。
    $follower = Auth::user()->follows->pluck('id');
    $follower_users = User::WhereIn('id',$follower)
    ->limit(20)
    ->get();
    //フォローしてくれている人の投稿データ
    $followser_post = Post::WhereIn('user_id',$follower)
    ->latest('updated_at')
    ->get();

    return view('follows.followerList',compact('follower_users','followser_post'));

}



}

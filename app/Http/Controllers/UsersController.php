<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UsersController extends Controller
{
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

}

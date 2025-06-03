<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class PostsController extends Controller
{
    //ログイン後画面
    public function index(){

        return view('posts.index');
    }

    // authログアウト機能
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }


//新規投稿する
    public function create(Request $request) {

        $rules = ['post' => 'required|min:1|max:150',];
        $request->validate($rules);//バリデーション

        $id = Auth::id();

        //新規ポスト登録
        Post::create([
            'user_id' => $id,
            'post' => $request->post
        ],);

        //↓別の書き方。
        // $post = new Post();//SQLに登録
        // $post->user_id = Auth::id();
        // $post->post = $request->post;
        // $post->save();

        return back();
    }
}

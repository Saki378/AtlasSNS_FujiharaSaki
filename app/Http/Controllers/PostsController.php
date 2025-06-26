<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class PostsController extends Controller
{


//ログイン後画面
    public function index(){

        $follow_users = Auth::user()->followers->pluck('id');
        if (Auth::user()->followers()->exists()) {
            //フォローしている人、自分の投稿取得する。新しい順
            $posts_all= Post::where('user_id',$follow_users)
            ->orWhere('user_id',[Auth::id()])
            ->latest('updated_at')
            ->get();
            return view('posts.index')->with('posts_all',$posts_all);

        }elseif (Post::where('user_id',[Auth::id()])) {
            //自分の投稿取得する。新しい順
            $posts_all= Post::where('user_id',[Auth::id()])
            ->latest('updated_at')
            ->get();
            return view('posts.index')->with('posts_all',$posts_all);

        } else {

            return view('posts.index');
        }
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

// 投稿を更新する
    public function update(Request $request) {

        $up_id = $request->input('id');
        $up_post = $request->input('post');

        // 投稿編集バリデーション
        $rules = ['post' => 'required|min:1|max:150',];
        $request -> validate($rules);

        Post::where('id',$up_id)->update([
            'post' => $up_post]);

        return redirect()->route('top.show');
    }


// 投稿を削除する
    public function delete($id) {
        Post::where('id',$id)->delete();
        return redirect()->route('top.show');
    }


}

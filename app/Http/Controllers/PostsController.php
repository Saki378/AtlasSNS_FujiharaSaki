<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
}

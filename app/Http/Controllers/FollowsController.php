<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    // フォロワーページへ
    public function followerList(){
        return view('follows.followerList');
    }

    //ユーザーがフォローしているユーザーを抽出
    public function follow(){
        return $this->belongsToMany(User::class,'follows','user_id','following_id');
    }


}

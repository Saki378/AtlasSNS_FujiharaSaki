<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    //ユーザーがフォローしているユーザーを抽出
    // public function follow(){
    //     return $this->belongsToMany(User::class,'follows','user_id','following_id');
    // }


    //フォローする
    public function follow($id){
        $user_id=Auth::id();

        $check = Follow::Where('following_id',$user_id)->where('followed_id',$id);

        if ($check->count() == 0) {
            Follow::create([
                'following_id' => $user_id,
                'followed_id' => $id,
            ],);
        } else {

        }
        return redirect()->route('search.show');
    }


    //フォロー解除する
    public function unfollow($id){
        $user_id=Auth::id();

        Follow::Where('following_id',$user_id)->where('followed_id',$id)->delete();

        return redirect()->route('search.show');
    }


}

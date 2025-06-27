<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    //フォローする
    public function follow($id){
        $user_id=Auth::user();

        //checkFollowメソッドで真・偽を返す
        $check = $user_id->checkFollow($id);

        if (!$check) {
            Follow::create([
                'following_id' => $user_id->id,
                'followed_id' => $id,
            ]);
        }

        return redirect()->route('search.show');
    }


    //フォロー解除する
    public function unfollow($id){
        $user_id=Auth::user();

        $check = $user_id->checkFollow($id);
        if ($check) {
            Follow::Where('following_id',$user_id->id)->where('followed_id',$id)->delete();
        }

        return redirect()->route('search.show');
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;//画像ファイル保存メソッド

class ProfileController extends Controller
{

    public function index()
    {
        $id=Auth::id();
        $request=User::find($id);

        return view('profiles.profile',['request' => $request]);
    }



    //更新処理
    public function update (Request $request)
    {
        // 画像をpublic/imagesディレクトリに保存
         if ($request->hasFile('IconImage')) {
            $dir = 'images';
            $file = $request-> file('IconImage');
            $file_name=$request-> file('IconImage')->getClientOriginalName();

             $request->file('IconImage')->storeAs('public/' . $dir, $file_name);

             $request->IcomName =$file_name;
        ;}

        //バリデーション設定
        $rules = [
            'id' => 'required|min:1|max:150|',
            'username' => 'required|min:2|max:12|',
            'email' => [ 'required','min:5','max:40',Rule::unique('users')->ignore(Auth::id())],//自分を除外
            'NewPassword'=> 'required|min:8|max:20|alpha_num',
            'Bio'=> 'max:150|nullable',
            'IcomName'=> 'image|nullable',
        ];
        $request->validate($rules);



        // テーブルに処理を送信
        $id = $request->id;

        User::where('id',$id)->update(
            ['username' =>  $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->NewPassword),
            'bio' => $request->Bio,
            'icon_image' => $request->IcomName
            ]
        );

        return redirect('top');

    }
}

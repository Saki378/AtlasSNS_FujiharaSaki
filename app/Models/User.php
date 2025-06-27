<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'bio',
        'icon_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 投稿postとのリレーション（1対多　多）
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //フォロー　リレーション多対多
    //フォローしているユーザー
    public function followers(){
        return $this->belongsToMany('App\Models\User','Follows','following_id','followed_id');
    }

    //フォローされているユーザー
    public function follows(){
        return $this->belongsToMany('App\Models\User','Follows','followed_id','following_id');
    }


    //フォローテーブルに条件にあったレコードがあるか
    public function checkFollow(Int $id){
        return (boolean) $this->followers()->where('followed_id',$id)->first();
    }

}

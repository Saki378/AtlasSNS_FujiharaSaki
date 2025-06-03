<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    use HasFactory;

    //モデルに関連付けるテーブル
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     //登録・更新可能なカラム
    protected $fillable = [
        'user_id',
        'post',
    ];





}

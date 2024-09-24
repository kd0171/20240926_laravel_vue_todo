<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // マスアサインメント可能なフィールドを定義
    protected $fillable = ['title', 'completed'];

    // タグとの多対多の関係を定義
    public function tags()
    {
        // 'todo_tag'テーブルを使って、Tagモデルとの多対多の関係を定義
        return $this->belongsToMany(Tag::class, 'todo_tag');
    }
}

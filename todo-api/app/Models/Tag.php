<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // マスアサインメント可能なフィールドを定義
    protected $fillable = ['name'];

    // Todoとの多対多の関係を定義
    public function todos()
    {
        // 'todo_tag'テーブルを使って、Todoモデルとの多対多の関係を定義
        return $this->belongsToMany(Todo::class, 'todo_tag');
    }
}

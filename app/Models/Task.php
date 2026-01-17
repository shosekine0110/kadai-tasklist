<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ★ ここに追加（お気に入りしたユーザー一覧）
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    /**
     * アイテムを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * アイテムの保持するタグの取得
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

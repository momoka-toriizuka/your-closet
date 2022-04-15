<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * タグを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * タグ付けされたアイテムを取得
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
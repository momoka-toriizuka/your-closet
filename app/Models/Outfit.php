<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Outfit extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * コーディネートを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * アイテムの保持するタグの取得
     */
    public function items():BelongsToMany
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }
}

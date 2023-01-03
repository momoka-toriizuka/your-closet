<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    use HasFactory;

    protected $fillable = ['outfit_name'];

    /**
     * コーディネートを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

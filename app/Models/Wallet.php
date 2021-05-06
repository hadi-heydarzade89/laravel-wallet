<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $hidden = [
        'id', 'user_id', 'currency_id', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'user_id', 'currency_id', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}

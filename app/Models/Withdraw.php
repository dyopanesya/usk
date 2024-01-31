<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wallet;

class Withdraw extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function wallet()
    {
        return $this->belongsTo(Wallet ::class, 'rekening','rekening');
    }
}

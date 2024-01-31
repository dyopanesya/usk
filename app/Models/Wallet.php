<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class wallet extends Model
{
    use HasFactory;

    protected $guardded = [];

    public function user ()
    {
        return $this->belongsTo(User ::class, 'id_user');
    }
}
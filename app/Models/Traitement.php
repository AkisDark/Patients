<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Traitement extends Model
{
    use HasFactory;

    public function paitent()
    {
        return $this->belongsTo(User::class, 'paitent_id', 'id');
    }
}

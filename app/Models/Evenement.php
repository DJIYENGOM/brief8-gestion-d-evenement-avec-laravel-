<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{

    protected $fillable = [
        'libelle',
        'date_limite_inscription',
        'description',
        'image',
        'date_cloturer',
        'date_env',
        'lieu',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

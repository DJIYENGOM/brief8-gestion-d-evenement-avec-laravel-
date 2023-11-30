<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $fillable = [
        'nombre_place',
        'email',
        'even_id',
        'user_id'
    ];

    public function evenement()
    {
        return $this->hasMany(Evenement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

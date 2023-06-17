<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'long',
        'lat',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'destination_user');
    }

}

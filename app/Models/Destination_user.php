<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination_user extends Model
{
    use HasFactory;

    protected $table = 'destination_user';

    protected $fillable = [
        'user_id',
        'destination_id'
    ];

}

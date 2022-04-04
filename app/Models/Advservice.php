<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advservice extends Model
{
    use HasFactory;
    protected $table='advservices';
    protected $fillable=[
        'service'
    ];
}

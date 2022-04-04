<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $table='phones';
    protected $fillable=[
        'phone'
    ];
    public function company(){
        return $this->belongsTo('App\Models\Company' , 'comp-id');
    }
}

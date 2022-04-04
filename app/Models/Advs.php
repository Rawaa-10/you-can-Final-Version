<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advs extends Model
{
    use HasFactory;
    protected $table='advs';
    protected $primaryKey='adv_id';
    protected $fillable=[
        'place' , 'hours' , 'edate' , 'sdate' ,
        'category', 'cost' , 'picture' , 'explaining'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User' , 'user-id');
    }
}

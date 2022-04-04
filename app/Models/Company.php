<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table='companies';
    protected $primaryKey='comp_id';
    protected $fillable=[
        'location' , 'name', 'picture'
    ];
    public function type(){
        return $this->belongsTo('App\Models\Type' , 'type_id');
    }
}

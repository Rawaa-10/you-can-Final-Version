<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    use HasFactory;
    protected $table='permits';
    protected $primaryKey='permit_id';
    protected $fillable=[
        'permit'
    ];
    public function role(){
        return $this->belongsToMany('App\Models\Role','permit-role'
            , 'permit-id' , 'role-id');
    }
}

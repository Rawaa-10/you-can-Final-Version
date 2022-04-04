<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAccount extends Model
{
    use HasFactory;
    protected $table='type_accounts';
    protected $primaryKey='act_id';
    protected $fillable=[
        'type-act' , 'role'
    ];
    public  function role(){
        return $this->belongsTo('App\Models\Role' ,'role-id' );
    }
}

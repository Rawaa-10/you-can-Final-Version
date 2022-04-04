<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $primaryKey='role_id';
    protected $fillable=[
        'role-name'
    ];
    public function typeaccount()
    {
        return $this->hasOne('App\Models\TypeAccount');
    }

    public function permit(){
        return $this->belongsToMany('App\Models\Permit' , 'permit_role'
            , 'role-id' , 'permit-id');
    }

    public function user(){
        return $this->belongsToMany('App\Models\User' , 'role_user'
            , 'role-id' , 'user-id')
            ->withPivot( 'grant-date', 'grantor')->withTimestamps();
    }
}

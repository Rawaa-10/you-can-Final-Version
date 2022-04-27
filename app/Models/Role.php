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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

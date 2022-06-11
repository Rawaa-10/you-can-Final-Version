<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $fillable=[
        'role-name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeaccount()
    {
        return $this->hasOne('App\Models\TypeAccount');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function permission()
    {
        return $this->belongsToMany(Permit::class,"permit_role"  , "role_id","permit_id");
    }

    public function rolePermissions()
    {
        return $this->hasMany(PermitRole::class , "role_id");
    }
}

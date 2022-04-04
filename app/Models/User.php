<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='users';
    protected $primaryKey='user_id';
    protected $fillable = [
        'f-name','l-name' ,
        'email',
        'password','picture' , 'phone' , 'education', 'birth-date'
        ,'address'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function  company(){
        return $this->belongsTo('App\Models\Company' , 'comp_id');
    }

    public function  typeaccount(){
        return $this->belongsTo('App\Models\TypeAccount' , 'act_id');
    }
//اعمل موديل ؟؟؟؟ pivot
    public function role(){
        return $this->belongsToMany('App\Models\Role' , 'role_user'
        , ' user-id' , 'role-id')
            ->withPivot('grant-date' , 'grantor')->withTimestamps();
    }
}

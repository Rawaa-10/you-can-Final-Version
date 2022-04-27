<?php
declare(strict_types=1);

namespace App\Models;

use App\Notifications\ResetPassNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword ;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='users';
    protected $primaryKey='user-id';
    protected $fillable = [
        'f-name','l-name',
        'email',
        'password'
        ,'picture' , 'phone' , 'education', 'birth-date'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  company(){
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   // public function  typeaccount(){
     //  return $this->belongsTo(TypeAccount::class);
    //}

        public function advs (){
            return $this->hasMany(Advs::class);
        }
      //  public function role (){
        //    return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
       // }

 /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
   public function sendPasswordResetNotification($token)
    {
        $url = 'https://spa.test/reset-password?token=' . $token;
        $this->notify(new ResetPassNotification($url));
    }



}

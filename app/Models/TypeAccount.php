<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAccount extends Model
{
    use HasFactory;
    protected $table='type_accounts';
    protected $fillable=[
        'type-act' , 'role'
    ];
    public  function role(){
        return $this->belongsTo('App\Models\Role'  );
    }
    public function user (){
        return $this->hasMany(User::class);
    }
}

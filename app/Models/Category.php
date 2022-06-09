<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;
    protected $table ='categories';
    protected $fillable = [ 'category'];
    protected $hidden = ['created_at','updated_at','pivot'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adv(){
        return $this->hasMany(Advs::class );
    }

    public function service(){
        return $this->belongsToMany(Category::class);
    }
}

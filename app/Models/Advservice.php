<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advservice
 * @package App\Models
 */
class Advservice extends Model
{
    use HasFactory;
    protected $table='advservices';
    protected $fillable=[
        'service'
    ];
    protected $hidden = ['created_at','updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adv(){
        return $this->hasMany(Advs::class );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category(){
        return $this->belongsToMany(Category::class);
    }
}

<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advs
 * @package App\Models
 */
class Advs extends Model
{
    use HasFactory;
    protected $table='advs';
    protected $primaryKey='adv_id';
    protected $fillable=[
        'place' , 'hours' , 'edate' , 'sdate' ,
        'category', 'cost' , 'picture' , 'explaining' , 'service_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class , 'user-id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Adverservice(){
        return $this->hasOne(Advservice::class);
    }
}

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adv(){
        return $this->belongsTo(Advs::class,'adv_id');
    }
}

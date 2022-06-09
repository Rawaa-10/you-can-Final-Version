<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Advs
 * @package App\Models
 */
class Advs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='advs';
    protected $fillable=[
        'location' , 'working_hour' , 'e-date' , 's-date',
        'category_id','cost' , 'picture' , 'explaining' , 'advservice_id'
    ];
   // protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Adverservice(){
        return $this->belongsTo(Advservice::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category(){
       return $this->hasManyThrough( 'App\Models\Category'
           , 'App\Models\AdvserviceCategory' , '');
    }
}

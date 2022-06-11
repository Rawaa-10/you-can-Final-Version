<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvserviceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['advservice_id' , 'category_id'];
    protected $table = 'advservice_category' ;
}

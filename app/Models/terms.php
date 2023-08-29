<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terms extends Model
{
   // use HasFactory;

    protected  $table='terms';
    public $timestamps=false;
    public  $fillable=[
        'description',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postrequirment extends Model
{
    //use HasFactory;

    protected  $table="Postrequirment";
    public  $timestamps=false;
    public $fillable=[
        'item_name',
        'description',
        'delivery_location',
        'item_qty',
        'suppler',
        'valid_date',
        'call_time',
        'files',
        'name',
        'phone',
        'address',

    ];
}

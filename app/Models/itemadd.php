<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemadd extends Model
{
    //use HasFactory;
    protected $table="itemadd";
    public $timestamps=false;
    public $fillable=[
        'item',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_product extends Model
{
    //use HasFactory;


    protected $table="product_request";
    public $timestamps=false;
    public $fillable=[
        'Name',
        'Phone',
        'Email',
        'Product_link',
        'Product_link1',
        'Morelink',
        'Size',
        'color',
        'Quantity',
        'Status',
        'Date',
        'Comments',
    ];
}

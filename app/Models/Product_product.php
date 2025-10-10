<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_product extends Model
{
    use HasFactory;
    protected $table = 'Product_products';
    protected $primaryKey = 'Product_id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_discount extends Model
{
    use HasFactory;
    protected $table = 'Cart_discounts';
    protected $primaryKey = 'Discount_id';
}

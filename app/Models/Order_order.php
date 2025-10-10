<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_order extends Model
{
    use HasFactory;
    protected $table = 'Order_orders';
    protected $primaryKey = 'Order_id';
}

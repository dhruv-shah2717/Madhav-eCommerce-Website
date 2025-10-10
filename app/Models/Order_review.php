<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_review extends Model
{
    use HasFactory;
    protected $table = 'Order_reviews';
    protected $primaryKey = 'Review_id';
}

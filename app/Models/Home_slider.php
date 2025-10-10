<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_slider extends Model
{
    use HasFactory;
    protected $table = 'Home_sliders';
    protected $primaryKey = 'Slider_id';
}

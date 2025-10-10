<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_slideimage extends Model
{
    use HasFactory;
    protected $table = 'Home_slideimages';
    protected $primaryKey = 'Slideimage_id';
}

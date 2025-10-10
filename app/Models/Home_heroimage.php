<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_heroimage extends Model
{
    use HasFactory;
    protected $table = 'Home_heroimages';
    protected $primaryKey = 'Heroimage_id';
}

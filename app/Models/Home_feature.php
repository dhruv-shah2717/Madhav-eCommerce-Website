<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_feature extends Model
{
    use HasFactory;
    protected $table = 'Home_features';
    protected $primaryKey = 'Feature_id';
}

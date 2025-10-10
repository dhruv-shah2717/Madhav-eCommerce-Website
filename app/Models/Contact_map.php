<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_map extends Model
{
    use HasFactory;
    protected $table = 'Contact_maps';
    protected $primaryKey = 'Map_id';
}

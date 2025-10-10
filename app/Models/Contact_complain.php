<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_complain extends Model
{
    use HasFactory;
    protected $table = 'Contact_complains';
    protected $primaryKey = 'Complain_id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_information extends Model
{
    use HasFactory;
    protected $table = 'Contact_informations';
    protected $primaryKey = 'Information_id';
}

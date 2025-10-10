<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_user extends Model
{
    use HasFactory;
    protected $table = 'Register_users';
    protected $primaryKey = 'User_id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restrict extends Model
{
    use HasFactory;
    protected $visible = ['id', 'description'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remix extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'link'];
}

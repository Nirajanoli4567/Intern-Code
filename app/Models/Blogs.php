<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'category',
        'description',
        'photo',

        'created_at',
      ];
}

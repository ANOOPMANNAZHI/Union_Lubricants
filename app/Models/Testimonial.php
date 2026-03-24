<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['author_name', 'author_company', 'author_position', 'content', 'author_image', 'rating', 'is_featured'];
}

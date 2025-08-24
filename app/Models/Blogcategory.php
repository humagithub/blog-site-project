<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    use HasFactory;



    protected $table = 'blogcategories';

    // Allow mass assignment for the 'name' field
    protected $fillable = ['name'];
}



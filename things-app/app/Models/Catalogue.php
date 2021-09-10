<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'price', 'category', 'location', 'detail', 'image', 'user_id'
    ];
}

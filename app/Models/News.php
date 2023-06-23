<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $primaryKey = 'new_id';
    protected $fillable = [
        'new_title',
        'new_day',
        'new_image',
        'new_content'
    ];
}

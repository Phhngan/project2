<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'img_id';
    protected $fillable = [
        'img_url',
        'img_role',
        'prd_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }
}

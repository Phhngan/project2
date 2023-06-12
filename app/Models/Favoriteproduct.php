<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoriteproduct extends Model
{
    use HasFactory;
    protected $primaryKey = 'fav_id';
    protected $fillable = [
        'use_id',
        'prd_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'use_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Positiontype extends Model
{
    use HasFactory;
    protected $primaryKey = 'pos_id';
    protected $fillable = [
        'pos_name',
    ];

    public function user(){
        return $this->hasMany(User::class, 'pos_id', 'pos_id');
    }
}

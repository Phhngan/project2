<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $primaryKey = 'reg_id';
    protected $fillable = [
        'reg_name',
        'reg_ship',
        'reg_ship_extra',
        'reg_ship_time',
    ];

    public function province(){
        return $this->hasMany(Province::class, 'reg_id', 'reg_id');
    }
}

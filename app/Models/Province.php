<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $primaryKey = 'pro_id';
    protected $fillable = [
        'pro_name',
        'reg_id',
    ];

    public function region(){
        return $this->belongsTo(Region::class, 'reg_id', 'reg_id');
    }

    public function user(){
        return $this->hasMany(User::class, 'pro_id', 'pro_id');
    }

    public function salesInvoice(){
        return $this->hasMany(Salesinvoice::class, 'pro_id', 'pro_id');
    }
}

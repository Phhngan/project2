<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'com_id';
    protected $fillable = [
        'com_rate',
        'use_id',
        'prd_id',
        'sal_id',
        'com_detail',
        'com_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Ship::class, 'prd_id', 'prd_id');
    }

    public function salesInvoice()
    {
        return $this->belongsTo(Salesinvoice::class, 'sal_id', 'sal_id');
    }
}

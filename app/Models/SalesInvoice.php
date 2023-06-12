<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesinvoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'sal_id';
    protected $fillable = [
        'use_id',
        'sal_date',
        'sal_total',
        'vou_id',
        'ship_id',
        'sal_detailAddress',
        'sal_status_id',
        'sal_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'ship_id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'vou_id', 'vou_id');
    }

    public function salesInvoiceDetail()
    {
        return $this->hasMany(Salesinvoicedetail::class, 'sal_id', 'sal_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'sal_id', 'sal_id');
    }
}

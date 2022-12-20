<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'use_lastName',
        'name',
        'use_birth',
        'use_gender',
        'email',
        'use_phone',
        'pro_id',
        'use_district',
        'use_town',
        'use_detailAddress',
        'password',
        'pos_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function positionType(){
        return $this->belongsTo(Positiontype::class, 'pos_id', 'pos_id');
    }

    public function province(){
        return $this->belongsTo(Province::class, 'pro_id', 'pro_id');
    }

    public function importInvoice(){
        return $this->hasMany(Importinvoice::class, 'id', 'use_id');
    }

    public function salesInvoice(){
        return $this->hasMany(Salesinvoice::class, 'id', 'use_id');
    }
}

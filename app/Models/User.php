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
        'use_gender',
        'email',
        'use_phone',
        'use_detailAddress',
        'password',
        'pos_id',
        'use_gold'
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

    public function importInvoice()
    {
        return $this->hasMany(Importinvoice::class, 'id', 'use_id');
    }

    public function salesInvoice()
    {
        return $this->hasMany(Salesinvoice::class, 'id', 'use_id');
    }

    public function favoriteProduct()
    {
        return $this->hasMany(Favoriteproduct::class, 'id', 'use_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'id', 'use_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'id', 'use_id');
    }
}

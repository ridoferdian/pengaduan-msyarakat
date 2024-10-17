<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserAccount extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_accounts';

    protected $fillable = [
        'nik',
        'name',
        'email',
        'username',
        'password',
        'telp',
        'role',
        'agency_id',
    ];


    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function respon()
    {
        return $this->hasMany(ResponseInstansi::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
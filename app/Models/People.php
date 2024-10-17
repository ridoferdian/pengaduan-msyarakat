<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use Illuminate\Foundation\Auth\User as Authenticatable;


class People extends Authenticatable
{
    use HasFactory;

    protected $table = 'peoples';


    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    protected $fillable = [
        'nik',
        'name',
        'email',
        'username',
        'password',
        'telp',
    ];


}
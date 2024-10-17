<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $table = 'agencies';



    public function users()
    {
        return $this->hasMany(UserAccount::class, 'agency_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'agency_id', 'id');
    }
}
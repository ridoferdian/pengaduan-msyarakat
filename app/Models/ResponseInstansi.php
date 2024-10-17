<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseInstansi extends Model
{
    use HasFactory;

    protected $table = 'response_instansis';

    protected $fillable = [
        'id_message',
        'response_date',
        'response',
        'id_user'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'id_message', 'id_message');
    }

    public function adminInstansi()
    {
        return $this->belongsTo(UserAccount::class, 'id', 'id_user');
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use App\Models\Officer;


class Response extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_response';

    protected $fillable = [
        'id_message',
        'response_date',
        'response',
        'id_officer'
    ];

    public function message()
{
    return $this->belongsTo(Message::class, 'id_message', 'id_message');
}

public function officer()
{
    return $this->belongsTo(Officer::class, 'id_officer', 'id_officer');
}
}
<?php

namespace App\Models;

use App\Models\People;
use App\Models\Category;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $primaryKey = 'id_message';

    protected $fillable = [
        'date',
        'nik',
        'name',
        'category_id',
        'agency_id',
        'user_id',
        'title',
        'email',
        'report',
        'code',
        'photo',
        'status'
    ];

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case '0':
                return 'pending';
            case 'proses':
                return 'proses';
            case 'done':
                return 'selesai';
            default:
                return $value;
        }
    }

    protected $dates = ['date'];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(UserAccount::class, 'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'id');
    }

    public function response()
    {
        return $this->hasOne(Response::class, 'id_message', 'id_message');
    }
    public function responseInstansi()
    {
        return $this->hasOne(ResponseInstansi::class, 'id_message', 'id_message');
    }

}

<?php

namespace App\Models;

use App\Models\Copy_Message;
use App\Models\Message_Attach;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'message_no',
        'title',
        'description',
        'user_id',
    ];

    public function copy_message()
    {
        return $this->hasMany(Copy_Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function message_attach()
    {
        return $this->hasMany(Message_Attach::class);
    }

}

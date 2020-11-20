<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $with = ['ground_id'];

    public function ground_id()
    {
        return $this->hasOne(Ground::class, 'id', 'ground_id');
    }
}

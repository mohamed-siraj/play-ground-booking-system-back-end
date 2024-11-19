<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $with = ['ground_id', 'customer_id', 'ground_admin_id'];

    public function ground_id()
    {
        return $this->hasOne(Ground::class, 'id', 'ground_id');
    }

    public function customer_id()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function ground_admin_id()
    {
        return $this->hasOne(User::class, 'id', 'ground_admin_id');
    }
}

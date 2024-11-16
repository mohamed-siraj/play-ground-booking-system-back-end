<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    use HasFactory;

    protected $with = ['game_type_id', 'location_id', 'ground_admin_id'];

    public function game_type_id()
    {
        return $this->hasOne(GameType::class, 'id', 'game_type_id');
    }

    public function location_id()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }

    public function ground_admin_id()
    {
        return $this->hasOne(User::class, 'id', 'ground_admin_id');
    }
}

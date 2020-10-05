<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['User_1_ID','User_2_ID','Room_Number'];

    protected $primaryKey = 'Room_ID';
}

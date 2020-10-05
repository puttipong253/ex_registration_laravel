<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable = ['User_ID','Check_In','Check_Out','Room_ID','Note','Partner_ID'];

    protected $primaryKey = 'Hotel_ID';
}

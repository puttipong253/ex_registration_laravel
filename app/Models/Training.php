<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';
    protected $fillable = ['User_ID','ALOHA','I_Factory','E_Payment','I_SingleForm'];

    protected $primaryKey = 'T_ID';
}

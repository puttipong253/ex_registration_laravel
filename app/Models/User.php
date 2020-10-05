<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
                            'Prefix',
                            'F_Name',
                            'L_Name',
                            'Gender',
                            'Rank',
                            'Email',
                            'Phone',
                            'Province',
                            'Food_Group',
                            'Food_Allergy',
                            'Status'
                        ];
    protected $primaryKey = 'User_ID';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'website', 'email', 'about', 'country', 'check_box_1', 'check_box_2', 'check_box_3', 'check_box_4', 'status'];
}

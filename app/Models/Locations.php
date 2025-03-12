<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $fillable = ['location_code','location_name','region','phone','image','address'];
    protected $table = 'locations';
}

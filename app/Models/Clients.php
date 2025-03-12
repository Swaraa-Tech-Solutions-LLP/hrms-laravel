<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = ['name','email','phone','address','locations'];
    protected $table = 'clients';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContacts extends Model
{
    protected $fillable = ['employee_id','name','relationship','phone'];
    protected $table = 'emergency_contacts';
}

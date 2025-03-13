<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    protected $fillable = ['employee_id','date_of_birth','marital_status','gender','blood_group','profile_image'];
    protected $table = 'personal_details';
}

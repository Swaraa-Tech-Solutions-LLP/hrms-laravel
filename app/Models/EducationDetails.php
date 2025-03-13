<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDetails extends Model
{
    protected $fillable = ['employee_id','institution_name','degree_diploma','specialization','date_of_completion'];
    protected $table = 'education_details';
}

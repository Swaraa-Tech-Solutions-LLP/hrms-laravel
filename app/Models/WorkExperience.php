<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = ['employee_id','company_name','job_title','from_date','to_date','job_description'];
    protected $table = 'work_experience';
}

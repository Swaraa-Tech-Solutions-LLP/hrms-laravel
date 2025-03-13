<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkInfo extends Model
{
    protected $fillable = ['employee_id','department_id','client_id','location_id','designation_id','job_role_id','status','join_date'];
    protected $table = 'work_info';
}

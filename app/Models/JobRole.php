<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    protected $fillable = ['name','description'];
    protected $table = 'job_roles';
}

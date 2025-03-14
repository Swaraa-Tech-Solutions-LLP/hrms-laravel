<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deductions extends Model
{
    protected $table = 'deductions';
    protected $fillable = ['employee_id','code','deduction_type','description'];
}

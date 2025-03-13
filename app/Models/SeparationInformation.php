<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeparationInformation extends Model
{
    protected $fillable = ['employee_id','contract_starting_date','contract_ending_date','reason_for_leaving'];
    protected $table = 'separation_information';
}

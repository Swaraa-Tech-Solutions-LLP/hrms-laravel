<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryDetails extends Model
{
    protected $fillable = ['employee_id','ctc_salary','basic_monthly','house_rent_allowance_monthly','conveyance_allowance_monthly','fixed_allowance_monthly','basic_annual','house_rent_allowance_annual','conveyance_allowance_annual','fixed_allowance_annual'];
    protected $table = 'salary_details';
}

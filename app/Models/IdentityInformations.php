<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentityInformations extends Model
{
    protected $fillable = ['employee_id','sss_no','philhealth_no','hdmf','tax_identification_no'];
    protected $table = 'identity_informations';
}

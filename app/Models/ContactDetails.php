<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected $fillable = ['employee_id','mobile_number','present_address','present_city','present_state','present_country','present_national_id','permanent_address','permanent_city','permanent_state','permanent_country','permanent_national_id'];
    protected $table = 'contact_details';

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}

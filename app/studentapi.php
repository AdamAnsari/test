<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentapi extends Model
{
    //
    protected $table = 'studentapis';
    protected $fillable = ['name', 'birthday', 'gender', 'state', 'city', 'education', 'profile', 'skills', 'certificate[]', 'profession', 'company', 'job_started', 'business_name', 'location', 'email', 'mobile'];
}

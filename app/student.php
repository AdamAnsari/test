<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    //
    protected $table = 'students';
    protected $fillable = ['name', 'birthday', 'gender', 'state', 'city', 'education', 'profile', 'skills', 'certificate[]', 'profession', 'company', 'job_started', 'business_name', 'location', 'email', 'mobile'];
}

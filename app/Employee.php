<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number','job_id','department_id'];

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}

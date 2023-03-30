<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'name',
        'age',
        'phone_number',
        'ssn',
        'address',
        'pastjob',
        'leader',
        'job_desc',
        'status',
        'salary',
        'img',
        'pdf',
        'position'
    ];
}

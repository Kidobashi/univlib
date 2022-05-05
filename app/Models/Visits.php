<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    protected $fillable = [
        'idNumber',
        'studentName',
        'college',
        'course',
        'section',
        'created_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LibrarianUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
    ];
}

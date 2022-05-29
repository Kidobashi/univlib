<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Librarian_Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',

    ];

    public function category(){
        return DB::table('librarian_cat')->select('*')->get();
    }
}

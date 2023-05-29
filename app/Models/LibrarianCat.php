<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LibrarianCat extends Model
{

    protected $table='librarian_cat';

    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'category',
    ];

    public function users(){
        return $this->belongsToMany('App\Models\User')->withPivot('librarian_users');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieModel extends Model
{
    use HasFactory;
    protected $table = 'categorie';
    protected $fillable = [
        'name',
    ];
}

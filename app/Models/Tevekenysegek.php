<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tevekenysegek extends Model
{
    use HasFactory;

    protected $table = 'tevekenyseg';
    protected $primaryKey = 'tevekenyseg_id';

    protected $fillable = [
        'tevekenyseg_id',
        'tevekenyseg_nev',
        'pontszam'
    ];
}

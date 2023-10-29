<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
    'judul',
    'isi',
    'published_at',
    'enabled',
];
    protected $dates = [
    'published_at',
    'created_at',
    'updated_at',

];
}

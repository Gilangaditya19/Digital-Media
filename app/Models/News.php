<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news'; //untuk menentukan bahwa models news sesuai dengan database yang sudah dibuat

    protected $fillable = [ 
        'title',
        'author',
        'description',
        'content',
        'url',
        'url_image',
        'published_at',
        'category',
    ];  
}

//maksud dari kode diatas adalah untuk membuat atau memperbaharui data dengan cara mengisi array dengan nilai atribut
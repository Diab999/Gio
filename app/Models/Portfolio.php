<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Portfolio extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'category',
        'image',
    ];

    public $translatable = ['name', 'category'];
}

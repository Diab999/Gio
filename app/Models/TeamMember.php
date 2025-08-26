<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'image',
    ];

    public $translatable = ['name', 'role', 'bio'];

    // Performance optimization scopes
    public function scopeWithOptimizedQueries($query)
    {
        return $query->select(['id', 'name', 'slug', 'role', 'image', 'created_at'])
                     ->orderBy('created_at', 'desc');
    }

    public function scopeForAdmin($query)
    {
        return $query->withOptimizedQueries()
                     ->limit(100);
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    // Accessor for image path
    public function getImagePathAttribute()
    {
        return $this->image ? 'storage/' . $this->image : null;
    }
}

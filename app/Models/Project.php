<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'image',
        'project_date',
        'slug',
        'is_featured',
    ];

    public $translatable = ['name', 'description'];

    protected $casts = [
        'project_date' => 'date',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = \Str::slug($project->name);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('name') && empty($project->slug)) {
                $project->slug = \Str::slug($project->name);
            }
        });
    }

    // Performance optimization scopes
    public function scopeWithOptimizedQueries($query)
    {
        return $query->select(['id', 'name', 'slug', 'image', 'project_date', 'created_at'])
                     ->orderBy('created_at', 'desc');
    }

    public function scopeForAdmin($query)
    {
        return $query->withOptimizedQueries()
                     ->limit(100);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}

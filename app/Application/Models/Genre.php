<?php

namespace App\Application\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class Genre extends Model
{
    use HasUuids, HasFactory, Sluggable, SoftDeletes, Searchable;

    protected $table = 'genres';
    protected $keyType = 'uuid';

    public $incrementing = false;
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'content',
        'status',
        'user_id',
        'is_deleted',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'title' => 'string',
            'slug' => 'string',
            'description' => 'string',
            'keywords' => 'string',
            'content' => 'string',
            'status' => 'string',
            'user_id' => 'string',
            'is_deleted' => 'boolean',
        ];
    }

    protected static function newFactory()
    {
        return \Database\Factories\GenreFactory::new();
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function searchableAs(): string
    {
        return 'genres_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'content' => $this->content
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function films(): HasMany
    {
        return $this->hasMany(Film::class);
    }
}

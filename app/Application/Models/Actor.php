<?php

namespace App\Application\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Actor extends Model
{
    use HasUuids, HasFactory, Sluggable, SoftDeletes;

    protected $table = 'actors';
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
        'avatar',
        'name',
        'slug',
        'country',
        'birthday',
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
            'avatar' => 'string',
            'name' => 'string',
            'slug' => 'string',
            'country' => 'string',
            'birthday' => 'date:d/m/Y',
            'status' => 'string',
            'user_id' => 'string',
            'is_deleted' => 'boolean',
        ];
    }

    protected static function newFactory()
    {
        return \Database\Factories\ActorFactory::new();
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
                'source' => 'name'
            ]
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }
}

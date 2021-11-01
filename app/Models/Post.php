<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id'; // The primary key associated with the table.

    protected $keyType = 'uuid'; // The "type" of the auto-incrementing ID.

    public $incrementing = false; // Indicates if the IDs are auto-incrementing.

    protected $fillable = ['title','desc']; // The attributes that are mass assignable.


    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            // $model->setAttribute($model->getKeyName(), Uuid::uuid4());
            $model->setAttribute($model->getKeyName(), uniqid());
        });
    }

    /**
     * Get the user that owns the Post
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the likes for the Post
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}

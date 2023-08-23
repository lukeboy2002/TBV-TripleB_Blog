<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Member extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'id',
        'user_id',
        'image',
        'bio',
        'city',
        'birthday',
        'active',
        'points',
        'played_games',
        'won_games',
        'created_at',
        'updated_at',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

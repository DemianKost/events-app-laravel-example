<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Event extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'icon',
        'parser',
        'description',
        'notify',
        'tags',
        'meta',
        'channel_id'
    ];

    protected $casts = [
        'notify' => 'boolean',
        'tags' => AsCollection::class,
        'meta' => AsArrayObject::class,
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(
            related: Channel::class,
            foreignKey: 'project_id'
        );
    }

    public function events(): HasMany
    {
        return $this->hasMany(
            related: Event::class,
            foreignKey: 'channel_id'
        );
    }
}

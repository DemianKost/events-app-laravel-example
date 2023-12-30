<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Projects\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Project extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'status',
        'team_id'
    ];

    protected $casts = [
        'status' => Status::class,
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(
            related: Team::class,
            foreignKey: 'team_id'
        );
    }

    public function channels(): HasMany
    {
        return $this->hasMany(
            related: Channel::class,
            foreignKey: 'project_id',
        );
    }
}

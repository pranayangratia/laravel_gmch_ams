<?php

namespace App\Models;

use Database\Factories\ActivityFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $type
 * @property string $description
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $user
 * @method static ActivityFactory factory($count = null, $state = [])
 * @method static Builder|Activity newModelQuery()
 * @method static Builder|Activity newQuery()
 * @method static Builder|Activity query()
 * @method static Builder|Activity whereCreatedAt($value)
 * @method static Builder|Activity whereDescription($value)
 * @method static Builder|Activity whereId($value)
 * @method static Builder|Activity whereType($value)
 * @method static Builder|Activity whereUpdatedAt($value)
 * @method static Builder|Activity whereUserId($value)
 * @mixin Eloquent
 * @mixin Builder
 */
class Activity extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }
    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at->format('jS F, Y');
    }
    public function getFormattedTypeAttribute(): string
    {
        return ucwords(str_replace('_', ' ', $this->type));
    }
    public function getAttachmentUrlAttribute()
    {
        return $this->attachment_path ? asset('storage/' . $this->attachment_path) : null;
    }

}

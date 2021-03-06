<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $user_id
 * @property string $title
 * @property string $description
 *
 * @property string $artwork
 *
 * @property string $format
 *
 * @property string $timezone
 * @property string $language
 * @property boolean $explicit
 *
 * @property string $category
 * @property string $tags
 *
 * @property string $author
 * @property string $podcast_owner
 * @property string $email_owner
 * @property string $copyright
 *
 * @property int $step
 *
 * @property string $token
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Podcast $podcasts
 * @property User $user
 */
class Show extends Model
{
    protected $table = 'shows';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'artwork',
        'format',
        'timezone',
        'language',
        'explicit',
        'category',
        'tags',
        'author',
        'podcast_owner',
        'email_owner',
        'copyright',
        'token',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function podcasts(): HasMany
    {
        return $this->hasMany('App\Models\Podcast', 'show_id', 'id');
    }
}

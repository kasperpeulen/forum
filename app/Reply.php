<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Reply
 *
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereThreadId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reply whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User $user
 */
class Reply extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

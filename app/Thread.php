<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Thread
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Thread whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reply[] $replies
 * @property-read \App\User $user
 */
class Thread extends Model
{
    protected $guarded = [];

    public function path()
    {
        return '/threads/'.$this->id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}

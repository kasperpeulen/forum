<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForum extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_auth_user_may_paticipate_in_threads()
    {
        $this->be($user = factory(User::class)->create());

        $thread = factory(Thread::class)->create();
        $reply = factory(Reply::class)->create();

        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);
    }
}

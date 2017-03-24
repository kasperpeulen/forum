<?php

namespace Tests\Unit;

use App\Reply;
use App\Thread;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Thread
     */
    protected $thread;

    protected function setUp()
    {
        parent::setUp();
        $this->thread = factory(Thread::class)->create();
    }

    /**
     * @test
     */
    public function thread_has_creator()
    {
        $this->assertInstanceOf(User::class, $this->thread->user);
    }

    /**
     * @test
     */
    public function it_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'hello world',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}

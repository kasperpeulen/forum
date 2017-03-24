<?php

namespace Tests\Unit;

use App\Thread;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function thread_has_creator()
    {
        $thread = factory(Thread::class)->create();
        $this->assertInstanceOf(User::class, $thread->user);
    }
}

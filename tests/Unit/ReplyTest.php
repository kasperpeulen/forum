<?php

namespace Tests\Unit;

use App\Reply;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function it_belongs_to_an_user()
    {
        $reply = factory(Reply::class)->create();
        $this->assertInstanceOf(User::class, $reply->user);
    }
}

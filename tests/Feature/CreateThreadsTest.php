<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function auth_user_can_create_thread()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $thread = factory(Thread::class)->make();
        $this->post('/threads', $thread->toArray());
        $response = $this->get($thread->path());
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }

    /**
     * @test
     */
    public function guest_cannot_create_thread()
    {
        $this->withExceptionHandling();

        $this->post('/threads')
            ->assertRedirect('/login');

        $this->get('/threads/create')
            ->assertRedirect('/login');
    }
}

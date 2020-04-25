<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test void
     */

    public function it_shows_the_post_list(){
        $this->withoutExceptionHandling();
        //1. Given => teniendo un usuario autenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);

        factory(Post::class)->create([
            'title' => 'My first post',
            'excerpt' => 'My first post',
            'body' => 'My first post',
            'estatus' => 'published',
            'user_id' => $user->id,
        ]);

        $this->get('/posts')
        ->assertStatus(200)
        ->assertSee('My first post');
        
     }


    public function a_state_requires_a_body()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->postJson(route('posts.store'), ['title' => '']);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'message', 'errors' => ['title']
        ]);

    }

    /**
     * @test void
     */

    public function a_post_requires_a_minimum_of_characters()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->postJson(route('posts.store'), ['title' => 'asda']);

        $response->assertStatus(422);

        $response->assertJsonStructure([
            'message', 'errors' => ['title']
        ]);

    }
}


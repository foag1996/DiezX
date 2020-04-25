<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;


class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test void
     */

    public function it_shows_the_user_list(){
        $this->withoutExceptionHandling();
        //1. Given => teniendo un usuario autenticado
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        factory(User::class)->create([
            'name' => 'test',
            'email' => 'tet@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // 
        ]);

        $this->get('/users')
        ->assertStatus(200)
        ->assertSee('test');
        
     }


}


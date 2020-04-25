<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test void
     */
    public function testLogin()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/DiezX/public/login')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'password')
                    ->press('#login')
                    ->assertPatchIs('/DiezX/public/post')
                    ->screenshot('login')
                    ->assertAuthenticated();
        });
    }
}

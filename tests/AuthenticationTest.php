<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /*
     * Test to check if user can register
     */
    
    public function testUserCanRegister()
    {
        $this->visit('/signup')
             ->type('FirstNameUserOne', 'first_name')
             ->type('LastNameUserOne', 'last_name')
             ->type('userTest@register.com', 'email')
             ->type('userTestpassword', 'password')
             ->type('userTestpassword', 'password_confirmation')
             ->press('Sign up');
        $this->seeInDatabase('users', ['first_name' => 'FirstNameUserOne']);

        $users = User::all();

        $this->assertEquals(count($users), 1);

        $this->visit('/signup')
             ->type('FirstNameUserTwo', 'first_name')
             ->type('LastNameUserTwo', 'last_name')
             ->type('userTest2@register.com', 'email')
             ->type('userTest2password', 'password')
             ->type('userTest2password', 'password_confirmation')
             ->press('Sign up');
        $this->seeInDatabase('users', ['last_name' => 'LastNameUserTwo']);

        $users = User::all();

        $this->assertEquals(count($users), 2);

        $this->visit('/signup')
             ->type('FirstNameUserThree', 'first_name')
             ->type('LastNameUserThree', 'last_name')
             ->type('userTest3@register.com', 'email')
             ->type('userTest3password', 'password')
             ->type('userTest3password', 'password_confirmation')
             ->press('Sign up');
        $this->seeInDatabase('users', ['first_name' => 'FirstNameUserThree']);

        $users = User::all();

        $this->assertEquals(count($users), 3);
    }

    /*
     * Test to check if user can login
     */

    public function testUserCanLogIn()
    {
        $this->visit('/signup')
             ->type('FirstNameUserOne', 'first_name')
             ->type('LastNameUserOne', 'last_name')
             ->type('userTest@register.com', 'email')
             ->type('userTestpassword', 'password')
             ->type('userTestpassword', 'password_confirmation')
             ->press('Sign up');
        $this->seeInDatabase('users', ['first_name' => 'FirstNameUserOne']);

        $this->visit('/login')
             ->type('userTest@register.com', 'email')
             ->type('userTestpassword', 'password')
             ->press('Sign in')
             ->see('FirstNameUserOne');
    }

    /*
     * Test to check if user can logout
     */

    public function testUserCanLogOut()
    {
        $this->visit('/signup')
             ->type('FirstNameUserOne', 'first_name')
             ->type('LastNameUserOne', 'last_name')
             ->type('userTest@register.com', 'email')
             ->type('userTestpassword', 'password')
             ->type('userTestpassword', 'password_confirmation')
             ->press('Sign up');
        $this->seeInDatabase('users', ['first_name' => 'FirstNameUserOne']);

        $this->visit('/login')
             ->type('userTest@register.com', 'email')
             ->type('userTestpassword', 'password')
             ->press('Sign in')
             ->see('FirstNameUserOne');

        $this->visit('/request')
             ->click('Sign out')
             ->see('Welcome to AndeTracker');
    }
}

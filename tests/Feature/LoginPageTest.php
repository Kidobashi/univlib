<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_with_login_form()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();

        //$response->assertRedirect('/');
    }

   public function test_user_cannot_access_admin_page()
    {
        $user = User::factory()->create();

        $user->roles()->attach(1);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->get('/admin/users');

        $this->assertAuthenticated();
    }

    public function test_librarian_users()
    {
        $user = User::factory()->create();

        $user->roles()->attach(1);

        $and = rand(1, 3);
        $response = $this->post('/login', [
            'id'   => $and,
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->get('/admin/users');
        $rand = rand(1, 3);
        $cat = DB::table('librarian_cat')->select('id')->where('id', $rand)->first();

        $authed = $this->assertAuthenticated();

        $librarian = DB::table('librarian_users')->insert([
            'user_id' => $and,
            'category_id' => $cat->id,
        ]);
    }
}

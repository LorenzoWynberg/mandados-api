<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SanctumTokenFlowTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test user before each test.
        $this->user = User::factory()->create([
            'name' => 'Testing User',
            'email' => 'test@example.com',
        ]);
    }

    /**
     * Test that the test user exists in the database.
     */
    public function test_user_exists(): void
    {
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    /**
     * Test that the test user's password is correct.
     */
    public function test_password_is_correct(): void
    {
        $this->assertTrue(Hash::check('password', $this->user->password));
    }

    /**
     * Test that an API token can be issued for the test user.
     */
    public function test_can_issue_token(): void
    {
        $response = $this->postJson('/api/sanctum/token', [
            'email' => 'test@example.com',
            'password' => 'password',
            'device_name' => 'PHPUnit',
        ]);

        $response->assertStatus(200);
        $data = $response->json();
        $this->assertArrayHasKey('token', $data);
    }

    /**
     * Test that a protected route is accessible using the issued token.
     */
    public function test_protected_route_access(): void
    {
        // Issue an API token.
        $response = $this->postJson('/api/sanctum/token', [
            'email' => 'test@example.com',
            'password' => 'password',
            'device_name' => 'PHPUnit',
        ]);

        $token = $response->json('token');

        // Use the issued token to access the protected route.
        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ])->getJson('/api/user')
            ->assertStatus(200)
            ->assertJson([
                'email' => 'test@example.com',
            ]);
    }

    /**
     * Test that the issued token can be used to logout.
     */
    public function test_logout_revokes_token(): void
    {
        // Issue an API token.
        $response = $this->postJson('/api/sanctum/token', [
            'email' => 'test@example.com',
            'password' => 'password',
            'device_name' => 'PHPUnit',
        ]);

        $token = $response->json('token');

        // Logout using the token.
        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ])->postJson('/api/sanctum/logout')
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Logged out successfully',
            ]);

        // Refresh the application so that the authentication context is reset.
        $this->refreshApplication();

        // Subsequent request with the same token should be unauthorized.
        $this->withHeaders([
            'Authorization' => 'Bearer '.$token,
            'Accept' => 'application/json',
        ])->getJson('/api/user')
            ->assertStatus(401);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
class BerandaAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_open_beranda_admin()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    
    }
}

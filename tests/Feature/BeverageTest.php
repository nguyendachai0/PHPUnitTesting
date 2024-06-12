<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Beverage;
use App\Models\User;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;
    private $beverage;
    public function setUp(): void
    {
        parent::setUp();
        $this->beverage = Beverage::factory()->create();
    }

    public function test_a_user_can_visit_a_beverage_page_and_see_beverages(): void
    {
        $response = $this->get('/beverage');
        $response->assertSee($this->beverage->name);
        $response->assertStatus(200);
    }
    public function test_a_user_can_visit_single_beverage_page(): void
    {
        $response = $this->get('/beverage/' . $this->beverage->id);
        $response->assertSee($this->beverage->name);
        $response->assertStatus(200);
    }
    public function test_a_logged_in_user_can_buy_beverage(): void
    {
        //logged in user
        $user = User::factory()->create();
        $this->actingAs($user);
        $data = [
            'beverage_id' => $this->beverage->id,
            'price' => 200
        ];
        $response = $this->post('/beverage/buy', $data);
        //pose a data for buying

        // assert in database
        $this->assertDatabaseHas('purchases', $data);

        $response->assertStatus(201);
        // status

    }
}

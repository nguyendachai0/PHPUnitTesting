<?php

namespace Tests\Unit;

use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;
use App\Models\Beverage;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BererageTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     */
    private $beverage;
    protected function setUp(): void
    {
        parent::setUp();
        $this->beverage = Beverage::factory()->make();
    }
    public function test_beverage_has_name(): void
    {
        $this->assertNotEmpty($this->beverage->name);
    }
    public function test_beverage_has_type(): void
    {
        $this->assertNotEmpty($this->beverage->type);
    }
    public function test_a_minor_user_can_not_but_alcoholic_beverage()
    {
        $beverage = Beverage::factory()->make([
            'type' => 'Alcohol'
        ]);
        $user = User::factory()->make([
            'age' => 17
        ]);
        $this->actingAs($user);
        $this->expectException(MinorCannotBuyAlcoholicBeverageEXception::class);
        $beverage->buy();
    }
}

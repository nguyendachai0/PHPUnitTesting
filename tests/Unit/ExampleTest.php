<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @return void
     */
    public function test_that_homepage_is_accessible()
    {
        $response = $this->get('/');

        $response->assertSeeInOrder(['Ecosystem', 'Vibrant']);
    }
    public function test_user_has_age_attribute()
    {
        $user = User::factory()->make();
        $this->assertNotNull($user->age);
    }
}

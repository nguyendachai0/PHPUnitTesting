<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     */
    public function test_user_has_full_name_attribute(): void
    {
        $user = User::create(['name' => 'Hai', 'lastName' => 'Nguyen', 'email' => 'haindfullstack@gmail.com', 'password' => 'secret']);
        $this->assertEquals('Hai Nguyen', $user->fullname);
    }
}

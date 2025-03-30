<?php

namespace Tests;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected function adminLogin($user = null)
    {
        $user ??= Admin::factory()->create();

        $this->actingAs($user, 'admin');

        return $user;
    }
}

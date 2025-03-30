<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Admin;

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

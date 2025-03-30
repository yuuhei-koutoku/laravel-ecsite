<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Owner;
use Tests\TestCase;

class OwnersControllerTest extends TestCase
{
    public function test_オーナー一覧を表示()
    {
        $this->adminLogin();

        Owner::factory()->createMany([
            ['name' => '鈴木'],
            ['name' => '伊藤'],
        ]);

        $response = $this->get('admin/owners');

        $response
            ->assertOk()
            ->assertSee(['鈴木', '伊藤']);
    }
}

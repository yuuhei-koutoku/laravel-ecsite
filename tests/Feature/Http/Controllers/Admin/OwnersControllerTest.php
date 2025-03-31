<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
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

    public function test_オーナーを新規登録できる()
    {
        $this->adminLogin();

        $ownerPassword = 'suzuki123456';

        $validData = [
            'name' => '鈴木',
            'email' => 'suzuki@example.com',
            'password' => $ownerPassword,
            'password_confirmation' => $ownerPassword,
        ];

        $response = $this->post(route('admin.owners.store'), $validData);

        // オーナー一覧にリダイレクトすることを確認
        $response->assertRedirect(route('admin.owners.index'));

        // オーナー一覧で指定のメッセージが表示されることを確認
        $this->get('admin/owners')
            ->assertOk()
            ->assertSee('オーナー登録を実施しました。');

        // passwordとpassword_confirmationの要素を除く
        unset($validData['password'], $validData['password_confirmation']);

        // ownersテーブルにnameとemailが保存されていることを確認
        $this->assertDatabaseHas('owners', $validData);

        // 指定したパスワードがハッシュ化されて保存されていることを確認
        $this->assertTrue(Hash::check($ownerPassword, Owner::first()->password));

        // shopが新規登録されていることを確認
        $this->assertDatabaseHas('shops', [
            'owner_id' => Owner::first()->id,
            'name' => '店名を入力してください',
            'information' => '',
            'filename' => '',
            'is_selling' => true,
        ]);
    }
}

<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Owner;
use App\Models\Shop;
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

    public function test_オーナーを編集できる()
    {
        $this->adminLogin();

        $validData = [
            'name' => '鈴木',
            'email' => 'suzuki@example.com',
            'password' => 'suzuki123456',
        ];

        // オーナーとショップを作成
        $owner = Owner::factory()->create($validData);
        Shop::factory()->create(['owner_id' => $owner->id]);

        $this->get(route('admin.owners.edit', $owner->id))
            ->assertOk()
            ->assertSee(['鈴木', 'suzuki@example.com']);

        $ownerNewPassword = 'satou123456';

        $validData = array_merge($validData, [
            'name' => '佐藤',
            'email' => 'satou@example.com',
            'password' => $ownerNewPassword,
            'password_confirmation' => $ownerNewPassword,
        ]);

        // オーナーを更新
        $this->put(route('admin.owners.update', $owner), $validData)
            ->assertRedirect(route('admin.owners.index'));

        $this->get('admin/owners')
            ->assertOk()
            ->assertSee('オーナー情報を更新しました。');

        unset($validData['password'], $validData['password_confirmation']);

        // DBが正常に更新されたことを確認
        $this->assertDatabaseHas('owners', $validData);
        $this->assertTrue(Hash::check($ownerNewPassword, Owner::first()->password));
        $this->assertDatabaseCount('owners', 1);
    }
}

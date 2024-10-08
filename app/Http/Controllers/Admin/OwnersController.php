<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Shop; // Eloquent エロクアント
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // QueryBuilder クエリビルダ
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Throwable;

class OwnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $owners = Owner::select('id', 'name', 'email', 'created_at')
            ->paginate(3);

        return view('admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Owner::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            DB::transaction(function () use ($request) {
                $owner = Owner::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                Shop::create([
                    'owner_id' => $owner->id,
                    'name' => '店名を入力してください',
                    'information' => '',
                    'filename' => '',
                    'is_selling' => true,
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return to_route('admin.owners.index')
            ->with(['message' => 'オーナー登録を実施しました。',
                'status' => 'info']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = Owner::findOrFail($id);

        return view('admin.owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('owners')->ignore($id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();

        return to_route('admin.owners.index')
            ->with(['message' => 'オーナー情報を更新しました。',
                'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::findOrFail($id)->delete(); // ソフトデリート

        return to_route('admin.owners.index')
            ->with(['message' => 'オーナー情報を削除しました。',
                'status' => 'alert']);
    }

    public function expiredOwnerIndex()
    {
        $expiredOwners = Owner::onlyTrashed()->get();

        return view('admin.expired-owners', compact('expiredOwners'));
    }

    public function expiredOwnerDestroy($id)
    {
        Owner::onlyTrashed()->findOrFail($id)->forceDelete();

        return to_route('admin.expired-owners.index');
    }
}

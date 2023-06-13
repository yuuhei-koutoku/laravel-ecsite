<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $inquiries = Inquiry::select('user_id', 'message', 'admin', 'deleted_at')
        ->withTrashed()
        ->whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('inquiries')
                ->groupBy('user_id');
        })
        ->orderByDesc('created_at')
        ->get();

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show($id)
    {
        $inquiries = Inquiry::where('user_id', $id)
        ->with(['user' => function ($query) {
            $query->select('id', 'name');
        }])
        ->withTrashed()
        ->get();

        return view('admin.inquiries.show', compact('inquiries'));
    }

    public function store(Request $request)
    {
        $user_id = $request->user_id;

        Inquiry::create([
            'user_id' => $user_id,
            'admin' => 1,
            'message' => $request->message,
        ]);

        return to_route('admin.inquiries.show', compact('user_id'))
        ->with(['message' => 'メッセージを送信しました。',
        'status' => 'info']);
    }

    public function softDestroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $user_id = $inquiry->user_id;
        $inquiry->delete();

        return to_route('admin.inquiries.show', compact('user_id'))
        ->with(['message' => 'メッセージの送信を取り消しました。',
        'status' => 'alert']);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index()
    {
        $inquiries = Inquiry::where('user_id', Auth::id())
        ->withTrashed()
        ->get();

        return view('user.inquiry', compact('inquiries'));
    }

    public function store(Request $request)
    {
        Inquiry::create([
            'user_id' => Auth::id(),
            'admin' => 0,
            'message' => $request->message,
        ]);

        return to_route('user.inquiry.index')
        ->with(['message' => 'メッセージを送信しました。',
        'status' => 'info']);
    }

    public function softDestroy($id)
    {
        Inquiry::findOrFail($id)->delete();

        return to_route('user.inquiry.index')
        ->with(['message' => 'メッセージの送信を取り消しました。',
        'status' => 'alert']);
    }
}

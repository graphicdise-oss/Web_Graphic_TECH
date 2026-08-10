<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'service' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $message = Message::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $data['service'] ?? 'สอบถามทั่วไป',
            'subject' => 'ติดต่อจากหน้าเว็บไซต์',
            'message' => $data['message'],
            'read' => false,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'data' => $message], 201);
        }

        return redirect(route('home') . '#contact')->with('sent', true);
    }
}

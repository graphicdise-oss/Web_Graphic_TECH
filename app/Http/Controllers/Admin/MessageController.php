<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public function markRead(Message $message): JsonResponse
    {
        $message->update(['read' => true]);

        return response()->json(['success' => true, 'data' => $message]);
    }

    public function destroy(Message $message): JsonResponse
    {
        $message->delete();

        return response()->json(['success' => true]);
    }
}

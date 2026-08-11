<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        return response()->json(Message::latest()->get());
    }

    public function store(Request $request) {
        $data = $request->all();
        if ('Message' === 'Message' && !isset($data['read'])) $data['read'] = false;
        if ('Message' === 'Banner' && !isset($data['active'])) $data['active'] = true;
        
        $item = Message::create($data);
        return response()->json(['success' => true, 'data' => $item], 201);
    }

    public function show($id) {
        return response()->json(Message::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $item = Message::findOrFail($id);
        $item->update($request->all());
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function destroy($id) {
        Message::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
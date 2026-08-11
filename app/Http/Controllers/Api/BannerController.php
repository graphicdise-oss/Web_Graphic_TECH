<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() {
        return response()->json(Banner::latest()->get());
    }

    public function store(Request $request) {
        $data = $request->all();
        if ('Banner' === 'Message' && !isset($data['read'])) $data['read'] = false;
        if ('Banner' === 'Banner' && !isset($data['active'])) $data['active'] = true;
        
        $item = Banner::create($data);
        return response()->json(['success' => true, 'data' => $item], 201);
    }

    public function show($id) {
        return response()->json(Banner::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $item = Banner::findOrFail($id);
        $item->update($request->all());
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function destroy($id) {
        Banner::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
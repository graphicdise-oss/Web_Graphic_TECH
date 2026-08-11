<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index() {
        return response()->json(Portfolio::latest()->get());
    }

    public function store(Request $request) {
        $data = $request->all();
        if ('Portfolio' === 'Message' && !isset($data['read'])) $data['read'] = false;
        if ('Portfolio' === 'Banner' && !isset($data['active'])) $data['active'] = true;
        
        $item = Portfolio::create($data);
        return response()->json(['success' => true, 'data' => $item], 201);
    }

    public function show($id) {
        return response()->json(Portfolio::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $item = Portfolio::findOrFail($id);
        $item->update($request->all());
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function destroy($id) {
        Portfolio::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index() {
        return response()->json(Testimonial::latest()->get());
    }

    public function store(Request $request) {
        $data = $request->all();
        if ('Testimonial' === 'Message' && !isset($data['read'])) $data['read'] = false;
        if ('Testimonial' === 'Banner' && !isset($data['active'])) $data['active'] = true;
        
        $item = Testimonial::create($data);
        return response()->json(['success' => true, 'data' => $item], 201);
    }

    public function show($id) {
        return response()->json(Testimonial::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $item = Testimonial::findOrFail($id);
        $item->update($request->all());
        return response()->json(['success' => true, 'data' => $item]);
    }

    public function destroy($id) {
        Testimonial::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
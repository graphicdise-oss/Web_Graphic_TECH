<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Portfolio;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Message;

Route::get('/portfolio', function () {
    return response()->json(Portfolio::latest()->get());
});

Route::get('/banners', function () {
    return response()->json(Banner::where('active', true)->latest()->get());
});

Route::get('/testimonials', function () {
    return response()->json(Testimonial::latest()->get());
});

Route::post('/messages', function (Request $request) {
    $msg = Message::create([
        'name' => $request->input('name', 'ผู้ติดต่อ'),
        'email' => $request->input('email', '-'),
        'phone' => $request->input('phone', '-'),
        'service' => $request->input('service', 'สอบถามทั่วไป'),
        'subject' => $request->input('subject', 'ติดต่อจากหน้าเว็บไซต์'),
        'message' => $request->input('message', ''),
        'read' => false,
    ]);

    return response()->json(['success' => true, 'data' => $msg], 201);
});

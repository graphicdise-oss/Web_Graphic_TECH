<?php

use Illuminate\Support\Facades\Route;
use App\Models\Portfolio;
use App\Models\Banner;
use App\Models\Testimonial;

/*
|--------------------------------------------------------------------------
| Public read-only API
|--------------------------------------------------------------------------
| Contact form submission lives on the "web" middleware group instead
| (routes/web.php: messages.store) since it's a same-origin HTML form
| and needs CSRF + session, not a stateless API guard.
*/

Route::get('/portfolio', function () {
    return response()->json(Portfolio::latest()->get());
});

Route::get('/banners', function () {
    return response()->json(Banner::where('active', true)->latest()->get());
});

Route::get('/testimonials', function () {
    return response()->json(Testimonial::latest()->get());
});

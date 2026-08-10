<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('active', true)->latest()->get();
        $portfolios = Portfolio::latest()->get();
        $testimonials = Testimonial::latest()->get();

        return view('home', compact('banners', 'portfolios', 'testimonials'));
    }

    public function page($slug)
    {
        $view = 'pages.' . $slug;
        if (view()->exists($view)) {
            return view($view);
        }
        abort(404);
    }
}

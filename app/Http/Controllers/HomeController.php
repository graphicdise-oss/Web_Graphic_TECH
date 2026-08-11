<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Testimonial;

use App\Models\Poster;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('active', true)->latest()->get();
        $portfolios = Portfolio::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $posters = Poster::all();

        return view('home', compact('banners', 'portfolios', 'testimonials', 'posters'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

use App\Models\Poster;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('active', true)->latest()->get();
        $services = Service::orderBy('id')->get();
        $portfolios = Portfolio::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $posters = Poster::all();

        return view('home', compact('banners', 'portfolios', 'testimonials', 'posters'));
    }

    public function page(string $slug)
    {
        if ($slug === 'about') {
            return view('pages.about');
        }

        $service = Service::where('slug', $slug)->firstOrFail();
        $posters = $service->posters()->where('active', true)->orderBy('sort_order')->get();
        $portfolios = $service->portfolios()->latest()->get();

        return view('pages.service', compact('service', 'posters', 'portfolios'));
    }
}

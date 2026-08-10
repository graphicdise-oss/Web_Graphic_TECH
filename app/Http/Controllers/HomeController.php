<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('active', true)->latest()->get();
        $services = Service::orderBy('id')->get();
        $portfolios = Portfolio::latest()->get();
        $testimonials = Testimonial::latest()->get();

        $portfolioItems = $portfolios->map(function (Portfolio $item) {
            $service = $item->service_id ? Service::find($item->service_id) : null;

            return [
                'id' => $item->id,
                'title' => $item->title,
                'category' => $item->category,
                'image' => $item->image,
                'tags' => $item->tags ?? [],
                'year' => $item->year,
                'service_slug' => $service?->slug,
                'page_url' => $service ? route('page', $service->slug) : null,
            ];
        })->values();

        return view('home', compact('banners', 'services', 'portfolios', 'portfolioItems', 'testimonials'));
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

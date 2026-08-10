<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'totalPortfolio' => Portfolio::count(),
            'totalBanners' => Banner::count(),
            'activeBanners' => Banner::where('active', true)->count(),
            'totalTestimonials' => Testimonial::count(),
            'totalMessages' => Message::count(),
            'unreadMessages' => Message::where('read', false)->count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();
        $portfolios = Portfolio::latest()->get();
        $banners = Banner::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $messages = Message::latest()->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'portfolios', 'banners', 'testimonials', 'messages'));
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (($username === 'admin' || $username === 'admin@graphictech.co.th') && $password === '1234') {
            session(['admin_user' => 'admin']);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'], 401);
    }

    public function logout()
    {
        session()->forget('admin_user');
        return redirect()->route('admin.dashboard');
    }
}

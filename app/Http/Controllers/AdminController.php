<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Message;
use App\Models\Poster;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Allow logging in with either the short "admin" alias or the full email.
        $email = str_contains($credentials['username'], '@')
            ? $credentials['username']
            : $credentials['username'] . '@graphictech.co.th';

        if (Auth::attempt(['email' => $email, 'password' => $credentials['password']], true)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withErrors(['username' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'])
            ->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        $stats = [
            'totalPortfolio' => Portfolio::count(),
            'totalBanners' => Banner::count(),
            'activeBanners' => Banner::where('active', true)->count(),
            'totalTestimonials' => Testimonial::count(),
            'totalMessages' => Message::count(),
            'unreadMessages' => Message::where('read', false)->count(),
            'totalServices' => Service::count(),
            'totalPosters' => Poster::count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();
        $services = Service::orderBy('id')->get();
        $portfolios = Portfolio::latest()->get();
        $banners = Banner::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $messages = Message::latest()->get();
        $posters = Poster::with('service')->orderBy('sort_order')->get();

        return view('admin.dashboard', compact(
            'stats', 'recentMessages', 'services', 'portfolios', 'banners', 'testimonials', 'messages', 'posters'
        ));
    }

    public function updateSettings(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:4'],
        ]);

        $user = $request->user();
        $user->name = $data['name'];
        if (! empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Message;
use App\Models\Poster;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $posters = Poster::all();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'portfolios', 'banners', 'testimonials', 'messages', 'posters'));
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

    public function updatePosters(Request $request)
    {
        $postersData = $request->input('posters');
        
        if (is_array($postersData)) {
            foreach ($postersData as $id => $data) {
                $poster = Poster::find($id);
                if ($poster) {
                    $title = array_key_exists('title', $data) ? $data['title'] : '';
                    $subtitle = array_key_exists('subtitle', $data) ? $data['subtitle'] : '';
                    
                    $poster->title = $title;
                    $poster->subtitle = $subtitle;
                    
                    if ($request->hasFile('posters.' . $id . '.image')) {
                        $file = $request->file('posters.' . $id . '.image');
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('assets/images/uploads'), $filename);
                        $poster->image = 'assets/images/uploads/' . $filename;
                    }
                    
                    $poster->save();
                }
            }
        }
        
        return redirect()->back()->with('success', 'Update successful');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/uploads'), $filename);
            return response()->json(['success' => true, 'url' => '/assets/images/uploads/' . $filename]);
        }
        return response()->json(['success' => false, 'message' => 'No file uploaded']);
    }

    public function saveBanner(Request $request)
    {
        $banner = Banner::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'image' => $request->input('image'),
                'link' => $request->input('link'),
                'active' => $request->input('active', true)
            ]
        );
        return response()->json(['success' => true, 'data' => $banner]);
    }

    public function deleteBanner(Request $request)
    {
        Banner::destroy($request->input('id'));
        return response()->json(['success' => true]);
    }

    public function savePortfolio(Request $request)
    {
        $portfolio = Portfolio::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'title' => $request->input('title'),
                'category' => $request->input('category', 'all'),
                'image' => $request->input('image'),
                'tags' => json_encode(explode(',', $request->input('tags', ''))),
                'year' => $request->input('year', 2024),
                'description' => $request->input('description')
            ]
        );
        return response()->json(['success' => true, 'data' => $portfolio]);
    }

    public function deletePortfolio(Request $request)
    {
        Portfolio::destroy($request->input('id'));
        return response()->json(['success' => true]);
    }

    public function saveServicePoster(Request $request)
    {
        $poster = Poster::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'title' => $request->input('title'),
                'subtitle' => $request->input('subtitle'),
                'image' => $request->input('image'),
                'category' => $request->input('category', 'hero')
            ]
        );
        return response()->json(['success' => true, 'data' => $poster]);
    }

    public function deleteServicePoster(Request $request)
    {
        Poster::destroy($request->input('id'));
        return response()->json(['success' => true]);
    }

    private function processBase64Image($base64Data)
    {
        if ($base64Data && preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
            $data = substr($base64Data, strpos($base64Data, ',') + 1);
            $type = strtolower($type[1]);
            
            $data = base64_decode($data);
            if ($data !== false) {
                if (!is_dir(public_path('assets/images/uploads'))) {
                    mkdir(public_path('assets/images/uploads'), 0777, true);
                }
                $fileName = uniqid() . '.' . $type;
                file_put_contents(public_path('assets/images/uploads/') . $fileName, $data);
                return '/assets/images/uploads/' . $fileName;
            }
        }
        return $base64Data;
    }
    public function saveMessage(Request $request)
    {
        $message = Message::create([
            'name' => $request->input('name', 'ผู้ติดต่อ'),
            'email' => $request->input('email', '-'),
            'phone' => $request->input('phone', '-'),
            'service' => $request->input('service', 'สอบถามทั่วไป'),
            'subject' => $request->input('subject', 'ติดต่อจากหน้าเว็บไซต์'),
            'message' => $request->input('message', '')
        ]);
        return response()->json(['success' => true, 'data' => $message]);
    }

    public function deleteMessage(Request $request)
    {
        Message::destroy($request->input('id'));
        return response()->json(['success' => true]);
    }

    public function readMessage(Request $request)
    {
        $message = Message::find($request->input('id'));
        if ($message) {
            $message->read = true;
            $message->save();
        }
        return response()->json(['success' => true]);
    }
}
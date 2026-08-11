<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Support\PlaceholderImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string'],
        ]);

        $data['link'] = $data['link'] ?? '#contact';
        $data['image'] = $data['image'] ?? PlaceholderImage::make($data['title'], $data['subtitle'] ?? '');
        $data['active'] = true;

        $banner = Banner::create($data);

        return response()->json(['success' => true, 'data' => $banner], 201);
    }

    public function toggle(Banner $banner): JsonResponse
    {
        $banner->update(['active' => ! $banner->active]);

        return response()->json(['success' => true, 'data' => $banner]);
    }

    public function destroy(Banner $banner): JsonResponse
    {
        $banner->delete();

        return response()->json(['success' => true]);
    }
}

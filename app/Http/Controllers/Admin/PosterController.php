<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:255'],
            'service_id' => ['nullable', 'exists:services,id'],
            'image' => ['required', 'string'],
        ]);

        $poster = Poster::create($data + ['active' => true, 'sort_order' => 0]);
        $poster->load('service');

        return response()->json(['success' => true, 'data' => $poster], 201);
    }

    public function toggle(Poster $poster): JsonResponse
    {
        $poster->update(['active' => ! $poster->active]);

        return response()->json(['success' => true, 'data' => $poster]);
    }

    public function destroy(Poster $poster): JsonResponse
    {
        $poster->delete();

        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'comment' => ['required', 'string'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
        ]);

        $data['rating'] = $data['rating'] ?? 5;
        $data['avatar'] = mb_substr($data['name'], 0, 1);

        $testimonial = Testimonial::create($data);

        return response()->json(['success' => true, 'data' => $testimonial], 201);
    }

    public function destroy(Testimonial $testimonial): JsonResponse
    {
        $testimonial->delete();

        return response()->json(['success' => true]);
    }
}

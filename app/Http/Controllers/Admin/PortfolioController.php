<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $this->validated($request);
        $portfolio = Portfolio::create($data);

        return response()->json(['success' => true, 'data' => $portfolio], 201);
    }

    public function update(Request $request, Portfolio $portfolio): JsonResponse
    {
        $data = $this->validated($request);
        $portfolio->update($data);

        return response()->json(['success' => true, 'data' => $portfolio]);
    }

    public function destroy(Portfolio $portfolio): JsonResponse
    {
        $portfolio->delete();

        return response()->json(['success' => true]);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
        ]);

        $data['tags'] = empty($data['tags'])
            ? []
            : array_values(array_filter(array_map('trim', explode(',', $data['tags']))));

        // The category select already matches a Service name 1:1 (Web
        // Development, Branding, UI/UX Design, ERP System, Graphic Design,
        // Digital Marketing) — link automatically so the item shows up on
        // that service's page without needing a second field in the form.
        $service = Service::where('name', $data['category'])->first();
        $data['service_id'] = $service?->id;

        if (empty($data['image'])) {
            $data['image'] = \App\Support\PlaceholderImage::make($data['title'], $data['category']);
        }

        return $data;
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poster;

class PosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poster::truncate();

        Poster::create([
            'title' => 'Kinto Coffee — Brand System',
            'subtitle' => 'Branding · 2023',
            'image' => null,
            'rotation' => '-4deg',
            'css_class' => 'collage-card--a',
        ]);

        Poster::create([
            'title' => 'ArtSpace Gallery',
            'subtitle' => 'Web Development',
            'image' => null,
            'rotation' => '5deg',
            'css_class' => 'collage-card--b',
        ]);

        Poster::create([
            'title' => 'ReBank Mobile UX',
            'subtitle' => 'UI/UX Design',
            'image' => null,
            'rotation' => '3deg',
            'css_class' => 'collage-card--c',
        ]);
    }
}

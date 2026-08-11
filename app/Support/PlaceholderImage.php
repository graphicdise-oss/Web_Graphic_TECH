<?php

namespace App\Support;

class PlaceholderImage
{
    /**
     * Build a data-URI SVG placeholder for content that has no real
     * uploaded image yet (seed data, or an admin-created record before
     * an image is attached). Keeps the site fully functional without
     * needing real media assets committed to the repo.
     */
    public static function make(string $title, string $subtitle = '', string $color1 = '#1976D2', string $color2 = '#0D47A1'): string
    {
        $title = htmlspecialchars($title, ENT_QUOTES);
        $subtitle = htmlspecialchars($subtitle, ENT_QUOTES);

        $subtitleTag = $subtitle !== ''
            ? "<text x=\"400\" y=\"260\" fill=\"rgba(255,255,255,0.8)\" font-size=\"20\" font-family=\"sans-serif\" text-anchor=\"middle\">{$subtitle}</text>"
            : '';

        $svg = <<<SVG
        <svg xmlns="http://www.w3.org/2000/svg" width="800" height="450" viewBox="0 0 800 450">
          <defs>
            <linearGradient id="g" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="{$color1}"/>
              <stop offset="100%" stop-color="{$color2}"/>
            </linearGradient>
          </defs>
          <rect width="800" height="450" fill="url(#g)"/>
          <circle cx="700" cy="80" r="160" fill="rgba(255,255,255,0.08)"/>
          <circle cx="100" cy="380" r="200" fill="rgba(255,255,255,0.05)"/>
          <text x="400" y="210" fill="#ffffff" font-size="34" font-weight="bold" font-family="sans-serif" text-anchor="middle">{$title}</text>
          {$subtitleTag}
        </svg>
        SVG;

        return 'data:image/svg+xml;charset=utf-8,' . rawurlencode($svg);
    }
}

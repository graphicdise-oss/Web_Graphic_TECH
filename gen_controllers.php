<?php
$controllers = [
    'PortfolioController' => 'Portfolio',
    'BannerController' => 'Banner',
    'TestimonialController' => 'Testimonial',
    'MessageController' => 'Message',
    'PosterController' => 'Poster',
    'ServicePortfolioController' => 'Service' // Actually Service doesn't map directly to service portfolio, wait.
];

// Let's just create generic controllers for them.
$template = <<<PHP
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Model};
use Illuminate\Http\Request;

class {Controller} extends Controller
{
    public function index() {
        return response()->json({Model}::latest()->get());
    }

    public function store(Request \$request) {
        \$data = \$request->all();
        if ('{Model}' === 'Message' && !isset(\$data['read'])) \$data['read'] = false;
        if ('{Model}' === 'Banner' && !isset(\$data['active'])) \$data['active'] = true;
        
        \$item = {Model}::create(\$data);
        return response()->json(['success' => true, 'data' => \$item], 201);
    }

    public function show(\$id) {
        return response()->json({Model}::findOrFail(\$id));
    }

    public function update(Request \$request, \$id) {
        \$item = {Model}::findOrFail(\$id);
        \$item->update(\$request->all());
        return response()->json(['success' => true, 'data' => \$item]);
    }

    public function destroy(\$id) {
        {Model}::findOrFail(\$id)->delete();
        return response()->json(['success' => true]);
    }
}
PHP;

foreach ($controllers as $controller => $model) {
    if ($controller === 'ServicePortfolioController') continue; // special case
    $code = str_replace(['{Controller}', '{Model}'], [$controller, $model], $template);
    file_put_contents(__DIR__ . '/app/Http/Controllers/Api/' . $controller . '.php', $code);
}
echo "Controllers generated.\n";

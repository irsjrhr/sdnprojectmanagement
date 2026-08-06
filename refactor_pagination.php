<?php

$controllers = [
    'BlueprintController.php',
    'BrdDocumentController.php',
    'EpicController.php',
    'ErdController.php',
    'FsdController.php',
    'ProjectController.php',
    'ProjectFeatureController.php',
    'SprintController.php',
    'TaskController.php',
];

$views = [
    'blueprints/index.blade.php',
    'brd-documents/index.blade.php',
    'epics/index.blade.php',
    'erds/index.blade.php',
    'fsds/index.blade.php',
    'projects/index.blade.php',
    'project-features/index.blade.php',
    'sprints/index.blade.php',
    'tasks/index.blade.php',
];

$controllerDir = 'c:/laragon/www/arxinoprojectmanagement/app/Http/Controllers/';
$viewDir = 'c:/laragon/www/arxinoprojectmanagement/resources/views/';

foreach ($controllers as $file) {
    $path = $controllerDir . $file;
    if (!file_exists($path)) continue;
    $content = file_get_contents($path);

    // Replace $perPage = ...
    // Specifically looking for $perPage = $request->query('per_page', 20); OR $perPage = request('per_page', 20);
    $pattern1 = '/\$perPage\s*=\s*\$request->query\(\'per_page\',\s*20\);/';
    $pattern2 = '/\$perPage\s*=\s*request\(\'per_page\',\s*20\);/';
    
    $replacement = "if (request()->has('per_page')) {\n            session(['global_per_page' => request('per_page')]);\n        }\n        \$perPage = session('global_per_page', 20);";

    $content = preg_replace($pattern1, $replacement, $content);
    $content = preg_replace($pattern2, $replacement, $content);

    file_put_contents($path, $content);
}

foreach ($views as $file) {
    $path = $viewDir . $file;
    if (!file_exists($path)) continue;
    $content = file_get_contents($path);

    // Replace the select options
    $newSelect = <<<HTML
<select name="per_page" id="perPageSelect" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1; color: #475569; font-size: 0.85rem; outline: none; cursor: pointer; background: #fff;" onchange="this.form ? this.form.submit() : null">
                    @php \$cpp = session('global_per_page', 20); @endphp
                    <option value="20" {{ \$cpp == 20 ? 'selected' : '' }}>20 per page</option>
                    <option value="50" {{ \$cpp == 50 ? 'selected' : '' }}>50 per page</option>
                    <option value="100" {{ \$cpp == 100 ? 'selected' : '' }}>100 per page</option>
                    <option value="all" {{ \$cpp === 'all' ? 'selected' : '' }}>Show All</option>
                </select>
HTML;

    // The select tags vary a bit in exact spacing and onchange. We will replace everything from <select name="per_page" ... to </select>
    $pattern = '/<select name="per_page"[^>]*>.*?<\/select>/is';
    
    // In async views, they don't have onchange="this.form.submit()". Let's preserve the original select tag if possible, or just remove onchange if it's async.
    // If it has onchange="this.form.submit()", we should keep it.
    if (strpos($content, 'onchange="this.form.submit()"') !== false) {
        $replacement = <<<HTML
<select name="per_page" onchange="this.form.submit()" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1; color: #475569; font-size: 0.85rem; outline: none; cursor: pointer; background: #fff;">
                    @php \$cpp = session('global_per_page', 20); @endphp
                    <option value="20" {{ \$cpp == 20 ? 'selected' : '' }}>20 per page</option>
                    <option value="50" {{ \$cpp == 50 ? 'selected' : '' }}>50 per page</option>
                    <option value="100" {{ \$cpp == 100 ? 'selected' : '' }}>100 per page</option>
                    <option value="all" {{ \$cpp === 'all' ? 'selected' : '' }}>Show All</option>
                </select>
HTML;
    } else {
        $replacement = <<<HTML
<select name="per_page" id="perPageSelect" style="padding: 6px 10px; border-radius: 6px; border: 1px solid #cbd5e1; color: #475569; font-size: 0.85rem; outline: none; cursor: pointer; background: #fff;">
                    @php \$cpp = session('global_per_page', 20); @endphp
                    <option value="20" {{ \$cpp == 20 ? 'selected' : '' }}>20 per page</option>
                    <option value="50" {{ \$cpp == 50 ? 'selected' : '' }}>50 per page</option>
                    <option value="100" {{ \$cpp == 100 ? 'selected' : '' }}>100 per page</option>
                    <option value="all" {{ \$cpp === 'all' ? 'selected' : '' }}>Show All</option>
                </select>
HTML;
    }

    $content = preg_replace($pattern, $replacement, $content);
    file_put_contents($path, $content);
}

echo "Refactored controllers and views successfully.";

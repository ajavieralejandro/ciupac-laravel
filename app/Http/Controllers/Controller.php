<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function sanitizeRichText(?string $value): string
    {
        $value = $value ?? '';

        if (function_exists('clean')) {
            return clean($value, 'ciupac_content');
        }

        $value = strip_tags($value, '<p><br><b><strong><i><em><ul><ol><li><a><h2><h3><h4><blockquote>');
        $value = preg_replace('/\son\w+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $value);
        $value = preg_replace('/\sstyle\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $value);
        $value = preg_replace('/href\s*=\s*(["\'])\s*(javascript:|data:)[^"\']*\1/i', 'href="#"', $value);

        return $value;
    }
}

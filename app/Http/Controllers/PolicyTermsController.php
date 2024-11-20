<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Parsedown;

class PolicyTermsController extends Controller
{
    public function showPolicy()
    {
        // Lee y convierte el archivo policy.md
        $markdownContent = File::get(resource_path('views/markdown/policy.md'));
        $parsedown = new Parsedown();
        $htmlContent = $parsedown->text($markdownContent);

        return view('policy', ['policy' => $htmlContent]);
    }

    public function showTerms()
    {
        // Lee y convierte el archivo terms.md
        $markdownContent = File::get(resource_path('views/markdown/terms.md'));
        $parsedown = new Parsedown();
        $htmlContent = $parsedown->text($markdownContent);

        return view('terms', ['terms' => $htmlContent]);
    }
}

<?php

function assetImage(string $path): string
{
    $baseUrl = app()->environment('local')
        ? 'http://127.0.0.1:8000/storage/images'
        : 'https://www.pqm-pharmaquality.com.co/images/';
    return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
}

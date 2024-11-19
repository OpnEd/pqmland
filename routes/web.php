<?php

use App\Livewire\Blog;
use App\Livewire\Contacto;
use App\Livewire\Nosotros;
use App\Livewire\PostList;
use App\Livewire\ShowPost;
use App\Livewire\Store;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('inicio');

Route::get('/nosotros', Nosotros::class)->name('nosotros');

Route::get('/blog', Blog::class)->name('blog');

Route::get('/posts', PostList::class)->name('posts');

// Route::get('/posts/{id}', ShowPost::class);
Route::get('/posts/{post}', ShowPost::class); // Puede hacerse así o de la forma anterior

Route::get('/contacto', Contacto::class)->name('contacto');

Route::get('/tienda', Store::class)->name('tienda');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

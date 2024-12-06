<?php

use App\Livewire\Blog;
use App\Livewire\Contacto;
use App\Livewire\Nosotros;
use App\Livewire\PostList;
Use App\Http\Controllers\PolicyTermsController;
use App\Livewire\Carrito;
use App\Livewire\CheckoutConfirm;
use App\Livewire\CurriculumVitae;
use App\Livewire\ProductList;
use App\Livewire\ShowPost;
use App\Livewire\ShowProduct;
use App\Livewire\Store;
use App\Livewire\Welcome;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('inicio');

Route::get('/nosotros', Nosotros::class)->name('nosotros');

Route::get('/blog', Blog::class)->name('blog');

Route::get('/posts', PostList::class)->name('posts');

// Route::get('/posts/{id}', ShowPost::class);
Route::get('/posts/{post}', ShowPost::class)
    ->middleware(['auth', 'verified'])
    ->name('post.show'); // Puede hacerse así o de la forma anterior

Route::get('/contacto', Contacto::class)->name('contacto');

Route::get('/tienda', Store::class)->name('tienda');

/* Route::get('/articulos', ProductList::class)->name('articulos'); */

Route::get('/tienda/{product}', ShowProduct::class)->name('articulo.show');

Route::get('/carrito', Carrito::class)->name('carrito');

Route::get('/pago', CheckoutConfirm::class)->name('checkout');

Route::get('/terminos', [PolicyTermsController::class, 'showTerms'])->name('terminos');

Route::get('/privacidad', [PolicyTermsController::class, 'showPolicy'])->name('privacidad');

Route::get('/curriculo/{user}', CurriculumVitae::class)->name('curriculo.user');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/tienda');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/debug-carrito', function () {
        dd(session('carrito'));
    });


require __DIR__.'/auth.php';

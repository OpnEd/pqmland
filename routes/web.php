<?php

use App\Livewire\Blog;
use App\Livewire\Contacto;
use App\Livewire\Nosotros;
use App\Livewire\PostList;
use App\Http\Controllers\PolicyTermsController;
use App\Livewire\Carrito;
use App\Livewire\CheckoutConfirm;
use App\Livewire\CurriculumVitae;
use App\Livewire\PaginaAgradecimiento;
use App\Livewire\PaginaAgradecimientoGuest;
use App\Livewire\ProductList;
use App\Livewire\ShowPost;
use App\Livewire\ShowProduct;
use App\Livewire\Store;
use App\Livewire\Welcome;
use App\Mail\OrderConfirmed;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Livewire\Payment;
use App\Http\Controllers\PaymentController;
use App\Livewire\PaymentConfirmation;
use App\Livewire\PaymentResponse;

/* Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    //Artisan::call('filament:clear-components');
    //Artisan::call('icons:clear');

    return '¡Caché limpia exitosamente!';
});

Route::get('/optimize-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');

    return '¡Caché generada exitosamente!';
});


Route::get('/create-symlink', function () {
    Artisan::call('storage:link');
});*/

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

//Route::get('/pago', CheckoutConfirm::class)->name('checkout');

Route::get('/pago', Payment::class)->name('checkout');

//Route::post('/confirmation', PaymentConfirmation::class)->name('payment.confirmation');
Route::post('/payment/confirmation', [PaymentController::class, 'confirmation'])->name('payment.confirmation');
/* Route::get('/response', PaymentResponse::class)->name('payment.response'); */

Route::get('/compra-usuario-realizada/{pedido_id}', PaginaAgradecimiento::class)->name('gracias.usuario');

/* Route::get('/compra-invitado-realizada/{guest_pedido_id}', PaginaAgradecimientoGuest::class)->name('gracias.guest'); */
Route::get('/compra-realizada', PaginaAgradecimientoGuest::class)->name('payment.response');

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

Route::get('/debug-session', function () {
    dd(session());
});

Route::get('/insert-status', function (Request $request) {
    // Insertar datos en la sesión
    $request->session()->put('orderStatus', 'COMPLETED');

    // Retornar una respuesta
    return back()->with('message', 'Datos insertados en la sesión!');
});

Route::get('/insert-mensaje', function (Request $request) {
    // Insertar datos en la sesión
    $request->session()->put('mensaje', 'Compra realizada con éxito!');

    // Retornar una respuesta
    return back()->with('message', 'Datos insertados en la sesión!');
});

/* Route::get('/testroute', function() {
    $name = "Funny Coder";

    // The email sending is done using the to method on the Mail facade
    Mail::to('rialmon@gmail.com')->send(new OrderConfirmed($name));
}); */

require __DIR__ . '/auth.php';

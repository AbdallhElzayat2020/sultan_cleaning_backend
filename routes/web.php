<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\Frontend\BookingController as FrontendBookingController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\GalleryController as FrontendGalleryController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/services', [FrontendServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [FrontendServiceController::class, 'show'])->name('services.show');
Route::get('/gallery', [FrontendGalleryController::class, 'index'])->name('gallery');
Route::get('/blog', [FrontendPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendPostController::class, 'show'])->name('blog.show');
Route::get('/about', [FrontendAboutController::class, 'index'])->name('about');
Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact');
Route::post('/booking', [FrontendBookingController::class, 'store'])->name('booking.store');

// Admin Dashboard Route
Route::get('/dashboard', [AdminHomeController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth']);

// Profile Routes (Breeze standard)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Resource Routes
Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    // Why Choose Us Section
    Route::resource('why-choose-us', WhyChooseUsController::class)->parameters([
        'why-choose-us' => 'whyChooseUs',
    ]);

    // Services Section
    Route::resource('services', ServiceController::class);

    // Gallery / Our Works Section
    Route::resource('galleries', GalleryController::class);

    // Testimonials / Reviews Section
    Route::resource('testimonials', TestimonialController::class);

    // FAQs Section
    Route::resource('faqs', FaqController::class);

    // Blog Posts Section
    Route::resource('posts', PostController::class);

    // Bookings & Quotes Section
    Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::patch('bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');
    Route::delete('bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');

    // General Site Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';

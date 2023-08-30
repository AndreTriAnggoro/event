<?php

use App\Http\Controllers\AttendingEventController;
use App\Http\Controllers\AttentingSystemController;
use App\Http\Controllers\DeleteCommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventIndexController;
use App\Http\Controllers\EventShowController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryIndexController;
use App\Http\Controllers\LikedEventController;
use App\Http\Controllers\LikeSystemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedEventController;
use App\Http\Controllers\SavedEventSystemController;
use App\Http\Controllers\StoreCommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestEventController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TagController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsByTagController;


Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/e', EventIndexController::class)->name('eventIndex');
Route::get('/e/{id}', EventShowController::class)->name('eventShow');
Route::get('/gallery', GalleryIndexController::class)->name('galleryIndex');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/events', EventController::class);
    Route::resource('/galleries', GalleryController::class);

    Route::get('/liked-events', LikedEventController::class)->name('likedEvents');
    Route::get('/saved-events', SavedEventController::class)->name('savedEvents');
    Route::get('/attendind-events', AttendingEventController::class)->name('attendingEvents');
    Route::post(
        '/events-like/{id}',
        LikeSystemController::class
    )->name('events.like');
    Route::post(
        '/events-saved/{id}',
        SavedEventSystemController::class
    )->name('events.saved');
    Route::post('/events-attending/{id}', AttentingSystemController::class)->name('events.attending');

    Route::post('/events/{id}/comments', StoreCommentController::class)->name('events.comments');
    Route::delete('/events/comments/{comment}', [App\Http\Controllers\EventCommentController::class, 'destroy'])->name('delete.comment');
    Route::get('/countries/{country}', function (Country $country) {
        return response()->json($country->cities);
    });
    Route::get('/all-events', [EventController::class, 'allEvents'])->name('all-events');
    Route::get('/events-by-city', [EventController::class, 'showEventsByCity'])->name('events-by-city');
    Route::get('events-by-tag/{tagName}', [EventsByTagController::class, 'index'])->name('events-by-tag');
    Route::post('tags', [TagController::class, 'store'])->name('tags.store');

});

require __DIR__ . '/auth.php';
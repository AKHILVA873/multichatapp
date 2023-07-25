<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\DashboardController;
//Route::post('/select-contact/{userId}', [DashboardController::class, 'selectContact'])->name('select-contact');
//Route::get('/select-contact/{userId}', [DashboardController::class, 'selectContact'])->name('select-contact');
Route::get('/select-contact', [DashboardController::class, 'selectContact'])->name('select-contact');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 Route::post('/send-message', [DashboardController::class, 'sendMessage'])->name('send-message');
 Route::delete('/delete-message/{message_id}',[DashboardController::class, 'deleteMessage'])->name('delete-message');


Route::middleware('auth')->group(function () {
    Route::post('/like-message/{message_id}', [DashboardController::class, 'likeMessage'])->name('like-message');
    Route::post('/dislike-message/{message_id}', [DashboardController::class, 'dislikeMessage'])->name('dislike-message');
});


// Export the entire message as CSV
Route::post('/export-message/{receiver_id}', [DashboardController::class, 'exportMessage'])->name('export-message');

// Delete the entire message
Route::delete('/delete-entire-message/{receiver_id}', [DashboardController::class, 'deleteEntireMessage'])->name('delete-entire-message');



 //Route::post('/send-message', [DashboardController::class, 'sendMessage'])->name('send-message')->middleware('web');
//Route::post('/send-message', 'ChatController@sendMessage')->name('send-message');
Route::middleware(['auth'])->group(function () {
    // Your routes that require authentication go here
    // Example: Route::get('/dashboard', [DashboardController::class, 'index']);
});

// User authentication routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Chat room routes
Route::middleware('auth')->group(function () {
    Route::get('/chat-rooms', [ChatRoomController::class, 'index'])->name('chat.rooms.index');
    Route::get('/chat-rooms/create', [ChatRoomController::class, 'create'])->name('chat.rooms.create');
    Route::post('/chat-rooms', [ChatRoomController::class, 'store'])->name('chat.rooms.store');
    Route::get('/chat-rooms/{id}', [ChatRoomController::class, 'show'])->name('chat.rooms.show');
    Route::post('/chat-rooms/{id}/send', [ChatRoomController::class, 'sendMessage'])->name('chat.rooms.send');
});

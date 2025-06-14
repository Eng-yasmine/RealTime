<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';





// notifications mark as read
Route::get('/notifications/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
//notifications mark delete
Route::get('/notifications/clear', [NotificationController::class, 'DeleteNotificationsMarker'])->name('notifications.clear');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['admin'])->group(function () {

        ##------------------------------------------------------- ADMIN INDEX PAGE
        Route::get('/', AdminHomeController::class)->name('index');
    });



    require __DIR__ . '/adminAuth.php';
});

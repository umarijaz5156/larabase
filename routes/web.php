<?php

use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

$installed = Storage::disk('public')->exists('installed');

if ($installed === false) {
    Route::get('/setup', App\Livewire\Setup\Check::class)->name('setup.check');
    Route::post('/setup/last-step', [SetupController::class, 'lastStep'])->name('setup.last-step');
}

Route::get('/', function () {
    $installed = Storage::disk('public')->exists('installed');

    if ($installed === false) {
        return redirect()->route('setup.check');
    }
    return view('welcome');
})->name('home');

Route::get('/setup/finish', function () {
    $redirect = route('home');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    return view('setup-complete', compact('redirect'));
})->name('setup.finish');


Route::get('/logout-user', function () {
    Auth::logout();
    return redirect('/');
})->name('logout-user');

<?php

use App\Http\Controllers\Admin\SettingsController;
use App\Http\Livewire\Admin\Categories\ManageCategories;
use App\Http\Livewire\Admin\PromotedProducts\PromotedProducts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
// });

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('currencies', App\Livewire\Admin\Currencies::class)->name('currencies');
    Route::get('settings', App\Livewire\Admin\Settings\Index::class)->name('settings');
});


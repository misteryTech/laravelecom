<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminEditProfileComponents;
use App\Livewire\Admin\ViewProductsComponents;
use App\Livewire\DashboardComponents;
use App\Livewire\ProductsComponents;
use App\Livewire\ProfileComponents;
use App\Livewire\SweetAlert;
use App\Livewire\TesTingComponents;
use App\Livewire\User\UserDashboardComponent;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',DashboardComponents::class)->name('dashboard');
Route::get('/dashboard/profile',ProfileComponents::class)->name('dashboard.profile');
Route::get('/test',TesTingComponents::class)->name('test');

// Route::get('/admin-delete/{id}',ProductsComponents::class)->name('view.product');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::middleware(['auth'])->group(function(){
    Route::get('/products',ProductsComponents::class)->name('add.products');
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/dashboard',DashboardComponents::class)->name('dashboard');
});

Route::middleware(['auth','authadmin'])->group(function(){
    Route::get('/sweet-alert',SweetAlert::class);
    Route::get('/view/product',ViewProductsComponents::class)->name('view.products');
    Route::get('/add/products',ProductsComponents::class)->name('add.products');
    Route::get('/dashboard',DashboardComponents::class)->name('dashboard');
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/profile',AdminEditProfileComponents::class)->name('admin.editdashboard');

});



require __DIR__.'/auth.php';

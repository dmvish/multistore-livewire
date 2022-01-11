<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CartsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\EmailRepliesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\LabelsController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\Admin\PagesController;

use App\Http\Livewire\Admin\Categories\CreateEditCategory;

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

Route::get('/', function(){
    return redirect()->route('admin.dashboard', [], 301);
})->name('root');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.list');
Route::get('/carts', [CartsController::class, 'index'])->name('carts.list');
Route::get('/customers', [CustomersController::class, 'index'])->name('customers.list');
Route::get('/email-replies', [EmailRepliesController::class, 'index'])->name('email-replies.list');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/create', CreateEditCategory::class)->name('categories.create');
Route::get('/categories/{category}/edit', CreateEditCategory::class)->name('categories.edit');

Route::get('/brands', [BrandsController::class, 'index'])->name('brands.list');
Route::get('/products', [ProductsController::class, 'index'])->name('products.list');
Route::get('/attributes', [AttributesController::class, 'index'])->name('attributes.list');
Route::get('/labels', [LabelsController::class, 'index'])->name('labels.list');
Route::get('/promotions', [PromotionsController::class, 'index'])->name('promotions.list');

Route::get('/pages', [PagesController::class, 'index'])->name('pages.list');


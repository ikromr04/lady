<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TextController;
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

Route::get('/', [PageController::class, 'home'])->name('page.home');
Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/career', [PageController::class, 'career'])->name('page.career');
Route::get('/products', [PageController::class, 'products'])->name('page.products');
Route::get('/products/{slug}', [PageController::class, 'productsSelected'])->name('page.products.selected');
Route::get('/contacts', [PageController::class, 'contacts'])->name('page.contacts');

Route::post('/data/search', [DataController::class, 'search']);
Route::post('/data/products', [DataController::class, 'products']);
Route::post('/data/products/filter', [DataController::class, 'productsFilter']);

Route::post('/admin/texts/update', [TextController::class, 'update']);

Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/admin/{path?}/{path2?}/{path3?}', [PageController::class, 'admin'])->name('admin');

  Route::get('/api/products', [ProductController::class, 'index']);
  Route::get('/api/products/{product}', [ProductController::class, 'show']);
  Route::post('/api/products', [ProductController::class, 'destroy']);
  Route::post('/api/products-store', [ProductController::class, 'store']);
  Route::post('/api/products-update', [ProductController::class, 'update']);

  Route::get('/api/categories', [CategoryController::class, 'index']);
  Route::post('/api/categories', [CategoryController::class, 'destroy']);
  Route::post('/api/categories-store', [CategoryController::class, 'store']);
  Route::post('/api/categories-update', [CategoryController::class, 'update']);

  Route::get('/api/tags', [TagController::class, 'index']);
  Route::post('/api/tags', [TagController::class, 'destroy']);
  Route::post('/api/tags-store', [TagController::class, 'store']);
  Route::post('/api/tags-update', [TagController::class, 'update']);

  Route::get('/api/prescriptions', [PrescriptionController::class, 'index']);
});

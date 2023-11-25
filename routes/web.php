<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\documentsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\usersController;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Auth\Events\Logout;
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

Route::get('/', [IndexController::class, 'index'])->name('homepage')->middleware('auth');

// Route de gestion des documents
Route::prefix('/documents')->middleware('auth')->controller(DocumentsController::class)->group(function () {
    Route::get('/', 'showAll')->name('all-docs-page');
    Route::get('/{id}', 'show')->name('show-doc-page')->where('id', '[0-9]+'); 
    Route::get('/add-form', 'showForm')->name('add-form-doc-page');
    Route::post('/add-form-action', 'addFormAction')->name('add-form-doc-action');
    Route::get('/remove/{id}', 'removeAction')->name('remove-doc-action');
});
Route::post('/add-perm-action', [PermissionController::class, 'addPermAction'])->name('add-perm-us-action')->middleware('auth');




//Route de gestion des parametres
Route::get('/settings', [SettingsController::class, 'showSettings'])->name('settings-page')->middleware('auth');
Route::get('/settings/user', [SettingsController::class, 'showSettingsUser'])->name('setting-user-page')->middleware('auth');
Route::post('/settings/user/add-form/action',[SettingsController::class,'addUsAction'])->name('add-form-us-action')->middleware('auth');
Route::get('/settings/user/remove/{id}', [SettingsController::class, 'removeUsAction'])->name('remove-us')->whereNumber('id')->middleware('auth');
Route::get('/settings/category', [SettingsController::class, 'showSettingsCategory'])->name('setting-category-page')->middleware('auth');
Route::post('/settings/category/add-form-action', [SettingsController::class, 'addFormAction'])->name('add-form-cat-action')->middleware('auth');
Route::get('/settings/category/remove/{id}', [SettingsController::class, 'removeCatAction'])->name('remove-cat')->whereNumber('id')->middleware('auth');
//route de gestion d'authentification
Route::get('/login', [AuthController::class, 'login'])->name('login-page');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login-action');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout-action');








































// Route::middleware(['auth'])->group(function () {
//     //route for homepage
//     Route::get('/', [documentsController::class, 'hp'])->name('homepage');
//     // Routes for documents
//     Route::prefix('documents')->group(function () {
//         Route::get('/', [documentsController::class, 'doc'])->name('documents.index');
//         Route::get('/add', [documentsController::class, 'add'])->name('addDoc');
//         Route::post('/add', [documentsController::class, 'storeDocument'])->name('documentstore');
//         // Add other document-related routes as needed
//     });

//     // Routes for categories
//     Route::prefix('categories')->group(function () {
//         Route::get('/', [categoriesController::class, 'category'])->name('categories');
//         Route::post('/', [categoriesController::class, 'storeCategory'])->name('categoriestore');
//         // Add other category-related routes as needed
//     });

//     // Route for logging out
//     Route::delete('/logout', [documentsController::class, 'logout'])->name('se-deconnecte');

//     // Route for user settings
//     Route::get('/settings', [documentsController::class, 'setting'])->name('settings');
//     //route for users
//     Route::get('/users', [usersController::class, 'user'])->name('users');
//     Route::post('/users', [usersController::class, 'storeUser']);
// });

// Route::middleware(['guest'])->group(function () {
//     Route::get('/login', [documentsController::class, 'log'])->name('login');
//     Route::post('/authentifier', [documentsController::class, 'authLogin'])->name('auth');
// });

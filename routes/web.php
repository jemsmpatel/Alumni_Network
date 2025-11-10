<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AlumniController as getAlumni;
use App\Http\Controllers\PostController;



use App\Http\Controllers\Auth\ContactController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\AlumniController;


use App\Http\Controllers\Auth\AdminDashboardController;
use App\Http\Controllers\Auth\AdminAlumniController;
use App\Http\Controllers\Auth\AdminContactController;
use App\Http\Controllers\Auth\AdminUserController;
use App\Http\Controllers\Auth\AdminEventController;
use App\Http\Controllers\Auth\AdminPostController;

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


require __DIR__.'/auth.php';


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'get']);
Route::post('/posts/{post}/comments', [DashboardController::class, 'addComment'])->name('comments.store');
Route::post('/posts/{post}/like', [DashboardController::class, 'like'])->name('posts.like');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/event', [EventController::class, 'get'])->name('event');

Route::get('/alumni', [getAlumni::class, 'get']);

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth'])->group(function () {

    Route::get('/edit-profile', function () {
        return view('edit-profile');
    })->name('edit-profile');

    Route::get('/profile', [ProfileController::class, 'get'])->name('profile.get');
    Route::post('/profile', [ProfileController::class, 'submit'])->name('profile.submit');

    Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store');

    Route::get('/alumni/update/post/{id}', [PostController::class, 'update'])->name('alumni.update');
    Route::post('/alumni/update/post/{id}', [PostController::class, 'update_post'])->name('alumni.update_post');
    Route::post('/alumni/delete/post/{id}', [PostController::class, 'delete_post'])->name('alumni.delete_post');

    Route::get('/posts', [PostController::class, 'get_posts']);
    Route::get('/add-post', [PostController::class, 'get']);
    Route::post('/add-post', [PostController::class, 'create_post'])->name('alumni.create_post');

    Route::get('/alumni-form', function () {
        return view('alumni-form');
    });
});

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/admin', [AdminDashboardController::class, 'get'])->name('admin.dashboard');

    Route::get('/admin/post', [AdminPostController::class, 'get'])->name('admin.post');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin.create');
    Route::post('/admin/post/create', [AdminPostController::class, 'create_post'])->name('admin.create_post');
    Route::get('/admin/post/{id}', [AdminPostController::class, 'update'])->name('admin.update');
    Route::post('/admin/post/{id}/update', [AdminPostController::class, 'update_post'])->name('admin.update_post');

    Route::get('/admin/member', [AdminUserController::class, 'get'])->name('admin.member.index');
    Route::get('/admin/member/{id}', [AdminUserController::class, 'update'])->name('admin.member');
    Route::post('admin/member/{id}/update', [AdminUserController::class, 'update_user'])->name('admin.update_user');

    Route::get('/admin/event', [AdminEventController::class, 'get'])->name('admin.create.index');
    Route::get('/admin/event/create', [AdminEventController::class, 'create'])->name('admin.create');
    Route::post('/admin/event/create', [AdminEventController::class, 'create_event'])->name('admin.create_event');
    Route::get('/admin/event/{id}', [AdminEventController::class, 'update'])->name('admin.update');
    Route::post('/admin/event/{id}/update', [AdminEventController::class, 'update_event'])->name('admin.update_event');

    Route::get('/admin/alumni', [AdminAlumniController::class, 'get'])->name('admin.alumni.index');
    Route::post('/admin/alumni/{id}/accept', [AdminAlumniController::class, 'accept'])->name('admin.accept_alumni');
    Route::post('/admin/alumni/{id}/reject', [AdminAlumniController::class, 'reject'])->name('admin.reject_alumni');
    Route::get('/admin/alumni/{id}', [AdminAlumniController::class, 'update'])->name('admin.alumni');
    Route::post('/admin/alumni/{id}/update', [AdminAlumniController::class, 'update_alumni'])->name('admin.update_alumni');

    Route::get('/admin/contact', [AdminContactController::class, 'get'])->name('admin.contact.index');
    Route::get('/admin/contact/{id}', [AdminContactController::class, 'update'])->name('admin.contact');
    Route::post('/admin/contact/{id}/update', [AdminContactController::class, 'update_contact'])->name('admin.update_contact');
});

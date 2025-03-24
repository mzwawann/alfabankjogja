<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\LogistikController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
// use App\Models\DataGrafik;
// use Illuminate\Support\Arr;
// use App\Http\Controllers\checkController;
// use App\Http\Controllers\Api\DataGrafikController;
// use App\Models\CourseRegistration;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Tampilkan form login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('login', [LoginController::class, 'login'])->name('login.store');

// Proses logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('login');
})->middleware(['auth', 'verified']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');


Route::get('/home', [ChartController::class, 'index'])->name('home');

Route::get('/', [ChartController::class, 'index'])->middleware('auth');

Route::get('/chart/data', [ChartController::class, 'getData'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function() {
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan');
});

// Route untuk halaman Akademik
Route::middleware('auth')->group(function() {
    Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');
});

// Route untuk halaman Logistik
Route::middleware('auth')->group(function() {
    Route::get('/logistik', [LogistikController::class, 'index'])->name('logistik');
});

Route::middleware('auth')->group(function() {
    Route::get('/marketing', [MarketingController::class, 'index'])->name('marketing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return view('about', ['nama' => '','title'=>'about']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Article', 'posts' => Post::filter(request(['search',
    'category', 'author']))->latest()->paginate(6)-> withQueryString()]);
});

Route::get('/posts/{post:slug}', function(Post $post){
    return view('post', ['title' => 'Single Post', 'post' => $post]);
}); 

Route::get('/authors/{user:username}', function(User $user){
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', ['title' => ' Articles in : ' . $category->name, 'posts' => $category->posts]);
});


//guestbook--------------------------------------------------------------------------------------
Route::resource('guests', GuestController::class);
Route::get('/guests', [GuestController::class, 'guestsbook'])->middleware(['auth', 'verified']);

Route::get('/guestsbook', [GuestController::class, 'index'])->name('guests.index')->middleware(['auth', 'verified']);

Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');

Route::get('/guests/create', [GuestController::class, 'create'])->name('guests.create');

Route::get('/create', function() {return view('guests.create', ['title' => 'Buku tamu']);
})->name('create');

Route::get('/guests/{guest}/edit', [GuestController::class, 'edit'])->name('guests.edit')->middleware(['auth', 'verified']);
Route::put('/guests/{guest}', [GuestController::class, 'update'])->name('guests.update')->middleware(['auth', 'verified']);
Route::delete('/guests/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy')->middleware(['auth', 'verified']);
//------------------------------------------------------------------------------------------------

//Pendaftaran-------------------------------------------------------------------------------------
Route::get('/pendaftaran', [CourseRegistrationController::class, 'create'])->name('pendaftaran');

Route::post('/register-course/store', [CourseRegistrationController::class, 'store'])->name('register-course.store');

Route::get('/siswa', [CourseRegistrationController::class, 'index'])->name('pendaftaran.index')->middleware(['auth', 'verified']);

Route::get('/edit', function(){
    return view('pendaftaran.edit', ['title' => 'Edit data siswa']);
})->name('edit')->middleware(['auth', 'verified']);

Route::get('/pendaftaran/{registration}/edit', [CourseRegistrationController::class, 'edit'])->name('pendaftaran.edit')->middleware(['auth', 'verified']);
Route::put('/pendaftaran/{registration}', [CourseRegistrationController::class, 'update'])->name('pendaftaran.update')->middleware(['auth', 'verified']);
Route::delete('/pendaftaran/{courseRegistration}', [CourseRegistrationController::class, 'destroy'])->name('pendaftaran.destroy')->middleware(['auth', 'verified']);

//---Dokumen ketentuan dan kebijakan kursus (PDF)
Route::get('/settings', [SettingsController::class, 'index'])->middleware(['auth', 'verified'])->name('settings');

Route::get('/settings/upload', [SettingsController::class, 'showUploadForm'])->name('settings.upload')->middleware(['auth', 'verified']);
Route::post('/settings/upload', [SettingsController::class, 'store'])->name('settings.upload.store')->middleware(['auth', 'verified']);

Route::delete('/settings/{id}', [SettingsController::class, 'destroy'])->name('settings.destroy')->middleware(['auth', 'verified']);
//------------------------------------------------------------------------------------------------
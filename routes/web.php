<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\DataGrafik;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\checkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\DataGrafikController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('login');
})->middleware(['auth', 'verified']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/home', function () {
    return view('home', ['title'=>'home']);
})->middleware(['auth', 'verified'])->name('home');

Route::get('/', [ChartController::class, 'index'])->middleware('auth');;

Route::get('/chart/data', [ChartController::class, 'getData'])->middleware(['auth', 'verified']);

Route::get('/marketing', function () {
    return view('marketing', ['title'=> 'marketing']);
})->middleware(['auth', 'verified'])->name('marketing');

Route::get('/akademik', function(){
    return view('akademik', ['title' => 'akademik']);
})->middleware(['auth', 'verified'])->name('akademik');

Route::get('/keuangan', function(){
    return view('keuangan', ['title' => 'keuangan']);
})->middleware(['auth', 'verified'])->name('keuangan');

Route::get('/logistik', function(){
    return view('logistik', ['title' => 'logistik']);
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/perkantoran', function() {
    return view('perkantoran', ['title' => 'Manajemen perkantoran']);
})->middleware(['auth', 'verified']);

Route::get('/pendaftaran', function() {
    return view('pendaftaran', ['title' => 'Pendaftaran']);
})->middleware(['auth', 'verified']);

Route::get('/design', function() {
    return view('design', ['title' => 'Desain grafis merchandise']);
})->middleware(['auth', 'verified']);

Route::get('/microsoft', function() {
    return view('microsoft', ['title' => 'Microsoft office']);
})->middleware(['auth', 'verified']);

Route::get('/bangunanbertingkat', function() {
    return view('bangunanbertingkat', ['title' => 'Percancangan struktur bangunan bertingkat']);
})->middleware(['auth', 'verified']);

Route::get('/teknik', function() {
    return view('teknik', ['title' => 'teknik gambar bangunan']);
})->middleware(['auth', 'verified']);

//Route::get('/test', [checkController::class, 'index'])->middleware(['auth', 'verified']);
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashCategoryController;
use App\Http\Controllers\DashPostController;
use App\Http\Controllers\PostController;
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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Murtaki, S.Kom",
        "email" => "murtakibangko@gmail.com",
        "img" => "foto.jpeg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'All Categories',
        "active" => "categories",
        'categories' => Category::all(),
    ]);
});
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts',[
//         'title'=>"All Posts Category : $category->name",
//         "active" => "categories",
//         'posts'=>$category->posts->load('author', 'category')
//         // 'category' => $category->name
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts',[
//         'title' => "Posts By : $author->name",
//         "active" => "posts",
//         'posts' => $author->posts->load('author', 'category')
//     ]);
// });




// Backend
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->middleware('auth');
Route::get('/dash/posts/checkSlug', [DashPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dash/posts', DashPostController::class)->middleware('auth');

Route::get('/dash/categories/checkSlug', [DashCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dash/categories', DashCategoryController::class)->middleware('admin');

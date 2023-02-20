<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    echo 'Menampilkan halaman awal website';
});

// Route::get('/about', function () {
//     echo 'NIM : 2141720111 <br>';
//     echo 'NAMA : Fiki Suganda';
// });

Route::get('/news/{id}', function ($id) {
    echo 'halaman berita dangan id = ' .$id;
});

//Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
//Route::get('/articles/{id}', [ArticlesController::class, 'articles']);

Route::get('/products/marbel-edu-games', function () {
    echo 'Menampilkan halaman marbel-edu-games';
});

Route::get('/products/marbel-and-friends-kids-games', function () {
    echo 'Menampilkan halaman marbel-and-friends-kids-games';
});

Route::get('/products/riri-story-books', function () {
    echo 'Menampilkan halaman riri-story-books';
});

Route::get('/products/kolak-kids-songs', function () {
    echo 'Menampilkan halaman kolak-kids-songs';
});

Route::prefix('products')->group(function () {
    Route::get('/', function () {
        echo '  <a href="http://localhost/smstr4/pwl_2/public/products/marbel-edu-games">marbel edu games</a><br>
                <a href="http://localhost/smstr4/pwl_2/public/products/marbel-and-friends-kids-games">marbel-and-friends-kids-games</a><br>
                <a href="http://localhost/smstr4/pwl_2/public/products/riri-story-books">riri-story-books</a><br>
                <a href="http://localhost/smstr4/pwl_2/public/products/kolak-kids-songs">kolak-kids-songs</a><br>
        ';
    });
});

Route::prefix('program')->group(function () {
    Route::get('/', function () {
        echo 'Menampilkan halaman program';
    });
});

Route::resource('/contact', HomeController::class);
<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HobiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('home');
// });

// Route::prefix('product')->group(function () {
//     Route::get('/', [HomeController::class, 'product']);

// Route::prefix('news')->group(function () {
//     Route::get('/{id}', [HomeController::class, 'news']);
// });

// Route::get('/about', function () {
//     echo 'NIM : 2141720111 <br>';
//     echo 'NAMA : Fiki Suganda';
// });



//Route::get('/', [HomeController::class, 'index']);

// Route::get('/about', [AboutController::class, 'about']);

//Route::get('/articles/{id}', [ArticlesController::class, 'articles']);

// Route::get('/products/marbel-edu-games', function () {
//     echo 'Menampilkan halaman marbel-edu-games';
// });

// Route::get('/products/marbel-and-friends-kids-games', function () {
//     echo 'Menampilkan halaman marbel-and-friends-kids-games';
// });

// Route::get('/products/riri-story-books', function () {
//     echo 'Menampilkan halaman riri-story-books';
// });

// Route::get('/products/kolak-kids-songs', function () {
//     echo 'Menampilkan halaman kolak-kids-songs';
// });

// Route::prefix('products')->group(function () {
//     Route::get('/', function () {
//         echo '  <a href="http://localhost/smstr4/pwl_2/public/products/marbel-edu-games">marbel edu games</a><br>
//                 <a href="http://localhost/smstr4/pwl_2/public/products/marbel-and-friends-kids-games">marbel-and-friends-kids-games</a><br>
//                 <a href="http://localhost/smstr4/pwl_2/public/products/riri-story-books">riri-story-books</a><br>
//                 <a href="http://localhost/smstr4/pwl_2/public/products/kolak-kids-songs">kolak-kids-songs</a><br>
//         ';
//     });
// });

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    Route::get('news/{id}',[HomeController::class, 'news']);

    Route::prefix('product')->group(function () {
        Route::get('/', [HomeController::class, 'product']);
    });
    
    Route::prefix('program')->group(function () {
        Route::get('/', [HomeController::class, 'program']);
    });
    
    Route::get('/about', [HomeController::class, 'about']);
    
    Route::resource('/contact-us', AboutController::class)->only(['index']);

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/kuliah', [KuliahController::class, 'index']);
    Route::get('/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/hobi', [HobiController::class, 'index']);
    Route::get('/keluarga', [KeluargaController::class, 'index']);
    Route::get('/matakuliah', [MatakuliahController::class, 'index']);
    Route::post('/mahasiswa/data', [MahasiswaController::class, 'data']);
    Route::get('/mahasiswa/{id}/pdf', [MahasiswaController::class, 'pdf']);
    Route::get('/mahasiswa/{id}/print-pdf', [MahasiswaController::class, 'print_pdf'])->name('print.nilai_mahasiswa');
    Route::resource('/mahasiswa', MahasiswaController::class)->parameter('mahasiswa', 'id');
    Route::get('/articles/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
    Route::resource('/articles', ArticleController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/', [LoginController::class, 'showLoginForm']);



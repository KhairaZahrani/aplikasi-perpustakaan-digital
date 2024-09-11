    <?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

Route::resource('buku', BukuController::class);
Route::resource('kategori', KategoriController::class);

route::get('/sesi', [SessionController::class, 'index']);
route::post('/sesi/login', [SessionController::class, 'login']);
route::get('/sesi/logout', [SessionController::class, 'logout']);

route::get('/sesi/register', [SessionController::class, 'register']);
route::post('/sesi/create', [SessionController::class, 'create']);

Route::get('/admin', function () {
    return view('admin.dashboard');
});

route::get('/admin', [DashboardController::class, 'index']);


Route::fallback(function () {
    return response()->make('
        <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
        <a href="/admin">Kembali ke Dashboard</a>');
});

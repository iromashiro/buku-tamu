<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ColorSchemeController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RegionDropdownController;
use App\Http\Controllers\TindakanController;
use App\Models\Farmasi;
use App\Models\Icd10;
use App\Models\Product;
use App\Models\RawatJalan;
use App\Models\RekamMedik;
use App\Models\Tindakan;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use PhpParser\Node\Stmt\Echo_;
use Rawilk\Printing\Facades\Printing;
use App\Events\NewPasienBaru;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisBantuanController;
use App\Http\Controllers\JenisPmksController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PenerimaBantuanController;
use App\Http\Controllers\PpksController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');
Route::get('color-scheme-switcher/{color_scheme}', [ColorSchemeController::class, 'switch'])->name('color-scheme-switcher');

Route::controller(AuthController::class)->group(function () {
    // login
    Route::get("/", "viewLogin")->name("view_login");
    Route::post("/", "submitLogin")->name("submit_login");
    // login

    // logout user
    Route::get("/logout", "logout")->name("logout");
    // logout user

    // tambah opd
    Route::get("/opd/tambah", "viewBuatOpd")->name("admin.view_buatopd");
    Route::post("/opd/tambah", "submitBuatOpd")->name("admin.submit_buatopd");
    // tambah opd

    // register user untuk opd
    Route::get("/register/{id_opd?}", "viewRegister")->name("admin.register");
    Route::post("/register", "submitRegister")->name("admin.submit_register");
    // register user untuk opd

    // list admin
    Route::get('/list', 'list_admin')->name('list.admin');
    // list admin

    //change password
    Route::get("/ganti_password", "viewGantiPassword")
        ->name("opd.ganti_password");
    Route::post("/ganti_password", "submitGantiPassword")
        ->name("opd.submit_ganti_password");


    // list opd
    Route::get(
        "/list/opd/json",
        "viewListOpdJson"
    )->name("admin.list.opd.json");
    Route::get("/list/opd", "viewListOpd")->name("admin.list_opd");
    // list opd
});

Route::controller(PpksController::class)->group(
    function () {
        Route::get('/ppks', 'index')->name('ppks.index');
        Route::get('/ppks/daftar', 'create')->name('ppks.create');
        Route::get('/ppks/history/{id}', 'history')->name('ppks.history');
        Route::get('/ppks/edit/{id}', 'edit')->name('ppks.edit');
        Route::post('/ppks', 'post')->name('ppks.post');
        Route::post('/ppks/meninggal/{id}', 'ket_meninggal')->name('ppks.meninggal.post');
        Route::post('/ppks/edit/{id}', 'post_edit')->name('ppks.edit.post');
        Route::delete('/ppks/delete/{id}', 'delete')->name('ppks.delete');


        Route::get('/bantuan/history/{id}', 'bantuan_history')->name('bantuan.history');
        Route::get('/bantuan/daftar', 'bantuan_create')->name('bantuan.create');
        Route::post('/bantuan', 'bantuan_post')->name('bantuan.post');
        Route::get('/getSubBantuan/{id}', 'getSubBantuan');


        Route::get('/ppks/laporan', 'laporan')->name('ppks.laporan');
    }
);

Route::controller(RegionDropdownController::class)->group(function () {
    Route::get('provinces', 'provinces')->name('provinces');
    Route::get('/cities/{province_id}', 'cities')->name('cities');
    Route::get('/districts/{city_id}', 'districts')->name('districts');
    Route::get('/villages/{district_id}', 'villages')->name('villages');
});

Route::controller(DashboardController::class)->group(
    function () {
        Route::get('/beranda', 'dashboard')->name('beranda');
        Route::get('/chart-data', 'showChart');
        Route::get('/filter-pmks-data/{id_pmks}', 'filterPmksData');

        Route::get('/filter-chart-data2/{kecamatanId}', 'filterChartData2');
        Route::get('/filter-chart-data3/{kecamatanId}', 'filterBantuan');
    }
);

Route::controller(JenisPmksController::class)->group(function () {
    Route::get('/jenis-pmks', 'jenis_pmks')->name('index.jenis-pmks');
    Route::get('/jenis-pmks/create', 'create_pmks')->name('create.jenis-pmks');
    Route::post('/jenis-pmks/post', 'post_pmks')->name('post.jenis-pmks');
    Route::get('/jenis-pmks/{id}', 'edit_pmks')->name('edit.jenis-pmks');
    Route::post('/jenis-pmks/{id}', 'update_pmks')->name('update.jenis-pmks');
    Route::delete('/jenis-pmks/delete/{id}', 'delete_pmks')->name('delete.jenis-pmks');
});

Route::controller(JenisBantuanController::class)->group(function () {
    Route::get('/jenis-bantuan', 'jenis_bantuan')->name('index.jenis-bantuan');
    Route::get('/jenis-bantuan/create', 'create_bantuan')->name('create.jenis-bantuan');
    Route::post('/jenis-bantuan/post', 'post_bantuan')->name('post.jenis-bantuan');
    Route::get('/jenis-bantuan/{id}', 'edit_bantuan')->name('edit.jenis-bantuan');
    Route::post('/jenis-bantuan/{id}', 'update_bantuan')->name('update.jenis-bantuan');
    Route::delete('/jenis-bantuan/delete/{id}', 'delete_bantuan')->name('delete.jenis-bantuan');
});

Route::controller(MobileController::class)->group(
    function () {
        Route::get('/index/mobile', 'index')->name('index.mobile');
        Route::get('/index/mobile/json', 'mobile_ppks')->name('ppks.mobile');
    }
);

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

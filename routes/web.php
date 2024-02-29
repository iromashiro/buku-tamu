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
    Route::get("/login", "viewLogin")->name("view_login");
    Route::post("/login", "submitLogin")->name("submit_login");
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

Route::controller(MobileController::class)->group(
    function () {
        Route::get('/', 'index')->name('index.mobile');
    }
);

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

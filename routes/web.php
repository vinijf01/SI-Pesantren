<?php

use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BiayaPendidikanController as AdminBiayaPendidikanController;
use App\Http\Controllers\Admin\CalonSantriController;
use App\Http\Controllers\Admin\CaraPendaftaranController;
use App\Http\Controllers\Admin\EkstrakulikulerController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\FotoProgramAkademikController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\HafalanController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroPPDBController;
use App\Http\Controllers\Admin\ImageFasilitasController;
use App\Http\Controllers\Admin\JadwalHarianController;
use App\Http\Controllers\Admin\KataPengantarController;
use App\Http\Controllers\Admin\KeteranganClassController;
use App\Http\Controllers\Admin\KetuaProgramController;
use App\Http\Controllers\Admin\PeminatController;
use App\Http\Controllers\Admin\ProgramAkademikController;
use App\Http\Controllers\Admin\RaportController;
use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\Admin\SyaratController;
use App\Http\Controllers\Admin\TentangPesantrenController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\VisiMisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PraPendaftaranController;

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

Route::get('/', [UserController::class, 'beranda'])->name('beranda');


Route::get('/visi-misi', [UserController::class, 'visi_misi'])->name('visi.misi');
Route::get('/ppdb', [UserController::class, 'ppdb'])->name('ppdb');
Route::get('/formulir-prapendaftaran', [UserController::class, 'formulir_prapendaftaran'])->name('formulir_prapendaftaran');
Route::get('/formulir-pendaftaran', [UserController::class, 'formulir_pendaftaran'])->name('formulir_pendaftaran');
Route::get('/404', [UserController::class, 'pengembangan'])->name('404');
Route::get('/yayasan', [UserController::class, 'yayasan'])->name('yayasan');
Route::get('/pesantren', [UserController::class, 'sekolah'])->name('sekolah');
Route::get('/program-akademik/{id}', [UserController::class, 'program_akademik'])->name('program-akademik');
Route::get('/berita', [UserController::class, 'berita'])->name('berita');
Route::get('/detail-berita/{id}', [UserController::class, 'detail_berita'])->name('detail-berita');
Route::get('/search-berita', [UserController::class, 'search'])->name('search-berita');

Route::get('/galeri', [UserController::class, 'galeri'])->name('galeri');
Route::get('/fasilitas', [UserController::class, 'fasilitas'])->name('fasilitas');
Route::get('/kontak', [UserController::class, 'kontak'])->name('kontak');
Route::resource('/pendaftaran', PendaftaranController::class);
Route::resource('/pra-pendaftaran', PraPendaftaranController::class);


//ADMIN
Route::get('/admin/login', [LoginController::class, 'show'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('login-request');
Route::get('/logout',  [LogoutController::class, 'perform'])->name('logout.perform')->middleware('auth');

Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard-admin');
Route::resource('admin-hero', HeroController::class);
Route::resource('admin-program-akademik', ProgramAkademikController::class);
Route::resource('admin-ketua-program', KetuaProgramController::class);
Route::resource('admin-tentang-pesantren', TentangPesantrenController::class);
Route::get('/admin/tentang-pesantren/edit_dk/{id}', [TentangPesantrenController::class, 'edit_dk'])
    ->name('admin-tentang-pesantren.edit_dk');
Route::put('/admin/tentang-pesantren/update_dk/{id}', [TentangPesantrenController::class, 'update_dk'])
    ->name('admin-tentang-pesantren.update_dk');
Route::resource('admin-ekstrakulikuler', EkstrakulikulerController::class);
Route::resource('admin-faq', FaqController::class);
Route::resource('admin-testimoni', TestimoniController::class);
Route::resource('admin-berita', BeritaController::class);
Route::resource('admin-galeri', GaleriController::class);
Route::resource('admin-visi-misi', VisiMisiController::class);
Route::resource('admin-kata-pengantar', KataPengantarController::class);
Route::resource('admin-foto-kegiatan-program', FotoProgramAkademikController::class);
Route::resource('admin-keterangan-kelas', KeteranganClassController::class);
Route::resource('admin-jadwal-harian', JadwalHarianController::class);
Route::resource('admin-hero-ppdb', HeroPPDBController::class);
Route::resource('admin-ppdb-syarat', SyaratController::class);
Route::resource('admin-ppdb-bank', BankController::class);
Route::resource('admin-ppdb-cara-pendaftaran', CaraPendaftaranController::class);
Route::resource('admin-ppdb-biaya-pendidikan', AdminBiayaPendidikanController::class);
Route::resource('admin-ppdb-peminat', PeminatController::class);
Route::resource('admin-ppdb-calon-santri', CalonSantriController::class);
Route::get('/admin/ppdb-calon-santri/detail/{id}', [CalonSantriController::class, 'detail'])
    ->name('ppdb-calon-santri.detail');
Route::get('/admin/ppdb-calon-santri/cetak-laporan-tahunan', [CalonSantriController::class, 'cetakLaporan'])
    ->name('ppdb-calon-santri.cetakLaporan');
Route::get('/lihat-laporan/{filename}', [CalonSantriController::class, 'lihatLaporan'])->name('lihat-laporan');
Route::resource('admin-data-santri', SantriController::class);
Route::get('/admin/data-santri/detail/{id}', [SantriController::class, 'detail'])
    ->name('data-santri.detail');
Route::resource('admin-raport-santri', RaportController::class);
Route::get('/admin/raport-santri/detail/{id_santri}', [RaportController::class, 'detail'])
    ->name('data-raport.detail');
Route::resource('admin-hafalan-santri', HafalanController::class);
Route::resource('admin-fasilitas', FasilitasController::class);
Route::resource('admin-image-fasilitas', ImageFasilitasController::class);
Route::get('/admin/laporan-tahunan-calon-santri', [CalonSantriController::class, 'raport'])->name('raport-calon-santri');
Route::get('/admin/laporan-tahunan-santri-wustho', [SantriController::class, 'raport_wustho'])->name('raport-santri-wustho');
Route::get('/admin/laporan-tahunan-santri-ulya', [SantriController::class, 'raport_ulya'])->name('raport-santri-ulya');
Route::get('/admin/laporan-tahunan-santri-takhosus', [SantriController::class, 'raport_takhosus'])->name('raport-santri-takhosus');
Route::get('/admin/laporan-tahunan-santri-idad', [SantriController::class, 'raport_idad'])->name('raport-santri-idad');

//ORANGTUA
Route::get('/parent/login', [LoginController::class, 'show'])->name('parent-login');
Route::post('/parent/login', [LoginController::class, 'login'])->name('parent-login-request');
Route::get('/parent/logout',  [LogoutController::class, 'Parentperform'])->name('parent-logout.perform')->middleware('auth');
Route::get('/dashboard/parent', [OrangtuaController::class, 'dashboardParent'])->name('dashboard-parent');

Route::resource('progress-santri', OrangtuaController::class);

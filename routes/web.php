<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\VillageHistoryController;
use App\Http\Controllers\VillageGeographyController;
use App\Http\Controllers\VillageDemographicController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\LembagaDesaController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

// News Routes
Route::prefix('berita')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{news}', [NewsController::class, 'show'])->name('news.show');
});

// Announcements Routes
Route::prefix('pengumuman')->group(function () {
    Route::get('/', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
});

// Events Routes
Route::prefix('agenda')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
});

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{galleryItem}', [GalleryController::class, 'show'])->name('gallery.show');

// Organization Routes
Route::get('/struktur-organisasi', [OrganizationController::class, 'index'])->name('organization.index');
Route::get('/struktur-organisasi/{organizationPosition}', [OrganizationController::class, 'show'])->name('organization.show');

Route::prefix('lembaga-desa')->name('lembaga-desa.')->group(function () {
    Route::get('/', [LembagaDesaController::class, 'index'])->name('index');
    Route::get('/{lembaga:slug}', [LembagaDesaController::class, 'show'])->name('show');
});

Route::prefix('layanan')->group(function () {
    Route::get('/kk', [App\Http\Controllers\KkServiceController::class, 'index'])->name('services.kk.index');
    Route::get('/kk/{service}', [App\Http\Controllers\KkServiceController::class, 'show'])->name('services.kk.show');

    Route::get('/ktp', [App\Http\Controllers\KtpServiceController::class, 'index'])->name('services.ktp.index');
    Route::get('/ktp/{service}', [App\Http\Controllers\KtpServiceController::class, 'show'])->name('services.ktp.show');

    Route::get('/pindah-datang', [App\Http\Controllers\PindahDatangServiceController::class, 'index'])->name('services.pindah-datang.index');
    Route::get('/pindah-datang/{service}', [App\Http\Controllers\PindahDatangServiceController::class, 'show'])->name('services.pindah-datang.show');

    Route::get('/kia', [App\Http\Controllers\KiaServiceController::class, 'index'])->name('services.kia.index');
    Route::get('/kia/{service}', [App\Http\Controllers\KiaServiceController::class, 'show'])->name('services.kia.show');

    Route::get('/peristiwa-penting', [App\Http\Controllers\PeristiwaPentingServiceController::class, 'index'])->name('services.peristiwa-penting.index');
    Route::get('/peristiwa-penting/{service}', [App\Http\Controllers\PeristiwaPentingServiceController::class, 'show'])->name('services.peristiwa-penting.show');
});

Route::prefix('transparansi')->group(function () {
    Route::get('/apbdesa', [App\Http\Controllers\ApbDesaController::class, 'index'])->name('apbdesa.index');
    Route::get('/apbdesa/{apbDesa}', [App\Http\Controllers\ApbDesaController::class, 'show'])->name('apbdesa.show');
});

Route::get('/maps', [MapController::class, 'index'])->name('maps.index');
Route::get('/maps/{slug}', [MapController::class, 'show'])->name('maps.show');
Route::get('/tentang-kami', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/visi-misi', [VisionMissionController::class, 'index'])->name('vision-mission.index');
Route::get('/sejarah-desa', [VillageHistoryController::class, 'index'])->name('village-history.index');
Route::get('/geografis-desa', [VillageGeographyController::class, 'index'])->name('village-geography.index');
Route::get('/demografi-desa', [VillageDemographicController::class, 'index'])->name('village-demographics.index');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{galleryItem}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/struktur-organisasi', [OrganizationController::class, 'index'])->name('organization.index');
Route::get('/struktur-organisasi/{organizationPosition}', [OrganizationController::class, 'show'])->name('organization.show');
Route::get('/perangkat-desa', [PerangkatDesaController::class, 'index'])->name('perangkat-desa.index');
Route::get('/potensi-desa', [App\Http\Controllers\PotensiDesaController::class, 'index'])->name('potensi-desa.index');

<?php

use App\Http\Controllers\Admin\AboutValueController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact.send');

Route::get('/sitemap.xml', function () {
    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $content .= '<url>';
    $content .= '<loc>' . url('/') . '</loc>';
    $content .= '<lastmod>' . now()->toW3cString() . '</lastmod>';
    $content .= '<changefreq>weekly</changefreq>';
    $content .= '<priority>1.0</priority>';
    $content .= '</url>';
    $content .= '</urlset>';
    return response($content, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/photo', [DashboardController::class, 'uploadPhoto'])->name('photo.upload');
    Route::delete('/photo', [DashboardController::class, 'deletePhoto'])->name('photo.delete');
    Route::post('/cv', [DashboardController::class, 'uploadCv'])->name('cv.upload');
    Route::delete('/cv', [DashboardController::class, 'deleteCv'])->name('cv.delete');
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('certifications', CertificationController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('about-values', AboutValueController::class);
    Route::resource('contact-infos', ContactInfoController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
});

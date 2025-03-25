<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SalesReportController;
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', function () { return view('about');
})->name('about');
Route::get('/contact', function () { return view('contact');})->name('contact');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/login', function () { return view('auth.login');
})->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::get('/dashboard', function () 
{ return view('dashboard');
})->middleware('auth');

Route::get('/home', function () {
    return view('dashboard'); // or any view you want for home
})->name('home');
 Route::get('/manage-cars', [CarController::class, 'index'])->name('manage.cars');
 Route::get('/sales-reports', [SalesReportController::class, 'index'])->name('sales.reports');
 

Route::get('/sales-reports', [SalesReportController::class, 'index'])->name('sales.reports');
Route::get('/sales-reports/export', [SalesReportController::class, 'exportCSV'])->name('sales.reports.export');


<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman home
Route::get('home', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman profile
Route::get('profile', ProfileController::class)->name('profile');

// Rute untuk resource employees
Route::resource('employees', EmployeeController::class);

// Rute untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});


//ini mulai praktikum modul 9
Route::get('/local-disk', function() {
    Storage::disk('local')->put('local-example.txt', 'This is local example
   content');
    return asset('storage/local-example.txt');
   });

Route::get('/public-disk', function() {
    Storage::disk('public')->put('public-example.txt', 'This is public example
    content');
    return asset('storage/public-example.txt');
   });

//tampilkan isi file lokal-publik
Route::get('/retrieve-local-file', function() {
    if (Storage::disk('local')->exists('local-example.txt')) {
    $contents = Storage::disk('local')->get('local-example.txt');
    } else {
    $contents = 'File does not exist';
    }
    return $contents;
   });

Route::get('/retrieve-public-file', function() {
    if (Storage::disk('public')->exists('public-example.txt')) {
    $contents = Storage::disk('public')->get('public-example.txt');
    } else {
    $contents = 'File does not exist';
    }
    return $contents;
   });

//download file lokal-publik
Route::get('/download-local-file', function() {
    return Storage::download('local-example.txt', 'local file');
   });

Route::get('/download-public-file', function() {
    return Storage::download('public/public-example.txt', 'public file');
   });

//tampilkan url path dan size file
Route::get('/file-url', function() {
    // Just prepend "/storage" to the given path and return a relative URL
    $url = Storage::url('local-example.txt');
    return $url;
   });
   Route::get('/file-size', function() {
    $size = Storage::size('local-example.txt');
    return $size;
   });
   Route::get('/file-path', function() {
    $path = Storage::path('local-example.txt');
    return $path;
   });

//simpan file via form
Route::get('/upload-example', function() {
    return view('upload_example');
   });
   Route::post('/upload-example', function(Request $request) {
    $path = $request->file('avatar')->store('public');
    return $path;
   })->name('upload-example');

//hapus file di storage
Route::get('/delete-local-file', function(Request $request) {
    Storage::disk('local')->delete('local-example.txt');
    return 'Deleted';
   });
   Route::get('/delete-public-file', function(Request $request) {
    Storage::disk('public')->delete('public-example.txt');
    return 'Deleted';
   });

//hapus file di storage
Route::get('/delete-local-file', function(Request $request) {
    Storage::disk('local')->delete('local-example.txt');
    return 'Deleted';
   });

   Route::get('/delete-public-file', function(Request $request) {
    Storage::disk('public')->delete('public-example.txt');
    return 'Deleted';
   });

//rute baru upload web data master
Route::get('download-file/{employeeId}', [EmployeeController::class,
   'downloadFile'])->name('employees.downloadFile');

//server side prosesing
Route::get('getEmployees', [EmployeeController::class,
'getData'])->name('employees.getData');

//ekspor excel
Route::get('exportExcel', [EmployeeController::class,
'exportExcel'])->name('employees.exportExcel');


//ekspor pdf
Route::get('exportPdf', [EmployeeController::class,
'exportPdf'])->name('employees.exportPdf');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

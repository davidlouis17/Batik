<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Event;
use App\Models\ProductCategory;

Route::get('/', function () {
    return file_get_contents(public_path('index.html'));
});

// Simple dashboard route for testing
Route::get('/admin-dashboard', function () {
    return '<h1>Dashboard Admin Batik</h1><p>Fitur upload gambar sudah lengkap!</p><a href="/">Kembali ke Website</a>';
})->name('admin.dashboard');


// API routes for testing
Route::get('/api/products', function () {
    return Product::with('category')->get();
});

Route::get('/api/events', function () {
    return Event::all();
});
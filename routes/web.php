<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::post('search', [ HomeController::class , 'index'])->name('BuscarId');
Route::post('update', [ HomeController::class , 'update'])->name('updateId');
Route::post('delete', [ HomeController::class , 'delete'])->name('deleteId');
Route::post('create', [ HomeController::class , 'create'])->name('CrearId');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SucursalesController;



Route::get('/usuarios',[UsuariosController::class,'index'])->name('index_usuarios');
Route::get('/usuarios/formulario/{id?}',[UsuariosController::class,'formulario']);
//Route::get('/usuarios/save',[UsuariosController::class,'save']);
Route::post('/usuarios/save', [UsuariosController::class, 'save']);
Route::get('/productos',[ProductosController::class,'index'])->name('index_productos');
Route::get('/productos/formulario/{id?}',[ProductosController::class,'formulario']);
Route::post('/productos/save', [ProductosController::class, 'save']);
Route::get('/sucursales',[SucursalesController::class,'index'])->name('index_sucursales');
Route::get('/sucursales/formulario/{id?}',[SucursalesController::class,'formulario']);
Route::post('/sucursales/save', [SucursalesController::class, 'save']);


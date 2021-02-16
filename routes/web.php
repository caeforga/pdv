<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\VentasController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Application;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['Middleware' => 'auth:sanctum', 'verified'], function() {
    Route::get('/dashboard', function() {return Inertia::render('Dashboard');})->name('dashboard');
    Route::get('/inicio', [HomeController::class, 'index'])->name('home');
    Route::get('/productos/index', [ProductosController::class, 'index'])->name('productos.index');
    Route::get('/productos/edit/{producto}', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/update', [ProductosController::class, 'update'])->name('productos.update');
    Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('/productos/save', [ProductosController::class, 'save'])->name('productos.save');
    Route::delete('/productos/destroy{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');
    Route::get('/vender/index', [VenderController::class, 'index'])->name('vender.index');

    Route::get('/ventas/index', [VentasController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/show', [VentasController::class, 'show'])->name('ventas.show');

    Route::get('/clientes/index', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::get('/clientes/edit/{cliente}', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/update', [ClientesController::class, 'update'])->name('clientes.update');
    Route::post('/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');
    Route::delete('/clientes/destroy{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

    Route::post('/vender/add', [VenderController::class, 'agregarProductoVenta'])->name('agregarProductoVenta');
    Route::delete('/vender/{}', [VenderController::class, 'quitarProductoDeVenta'])->name('quitarProductoVenta');
    Route::post('/vender/index', [VenderController::class, 'terminarOCancelarVenta'])->name('terminarOCancelarVenta');

});

/* Route::group(['Middleware' => 'auth:sanctum', 'verified'], function() {
    Route::get('/inicio', [HomeController::class, 'index'])->name('home');
    Route::get('/productos', [ProductosController::class, 'index']);
    Route::get('/ventas/ticket', [VentasController::class, 'ticket'])->name('ventas.ticket');
    Route::get('ventas', [VentasController::class]);
    Route::get('/vender', [VenderController::class])->name('vender.index');
    Route::post('/productoDeVenta', [VenderController::class, 'agregarProductoVenta'])->name('agregarProductoventa');
    Route::delete('/productoDeVenta', [VenderController::class, 'quitarProductoDeVenta'])->name('quitarProductoDeVenta');
    Route::post('/cancelarVenta', [VenderController::class, 'cancelarVenta'])->name('cancelarVenta');
    Route::post('/terminarVenta', [VenderController::class, 'terminarVenta'])->name('terminarVenta');
}); */
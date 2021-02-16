<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Database\Seeders\ProductSeeder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductosController extends Controller
{
    public function index() {
        $products = Producto::all();
        return Inertia::render('Productos/Index', ['products' => $products]);
    }
    public function edit(Producto $producto) {
        return Inertia::render('Productos/Edit', ['product' => $producto]);
    }
    public function destroy(Producto $producto) {
        $producto->delete();
        return redirect()->route('productos.index');
    }
    public function create() {
        return Inertia::render('Productos/Create');
    }
    public function store(Request $request) {
        $postData = $this->validate($request, [
            'codigo_barras' => 'required',
            'descripcion' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required',
            'existencia' => 'required',
        ]);
        echo $postData['codigo_barras'];
        $p = new Producto();
        $p->codigo_barras = $postData['codigo_barras'];
        $p->descripcion = $postData['descripcion'];
        $p->precio_compra = $postData['precio_compra'];
        $p->precio_venta = $postData['precio_venta'];
        $p->existencia = $postData['existencia'];
        $p->save();
        return redirect()->route('productos.index');
    }
    public function update(Request $request, Producto $producto) {
        /* $postData = $this->validate($request, [
            'codigo_barras' => 'required',
            'descripcion' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required',
            'existencia' => 'required',
        ]); */
        $producto->codigo_barras = $request->codigo_barras;
        $producto->descripcion = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->existencia = $request->existencia;
        $producto->save();
        return redirect()->route('productos.index');
    }
}

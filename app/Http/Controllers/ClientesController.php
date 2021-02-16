<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientesController extends Controller
{
    public function index() {
        $clients = Cliente::all();
        return Inertia::render('Clientes/Index', ['clients' => $clients]);
    }
    public function create() {
        return Inertia::render('Clientes/Create');
    }
    public function store(Request $request) {
        $postData = $this->validate($request, [
            'nombre' => 'required',
            'telefono' => 'required',
        ]);
        $c = new Cliente();
        $c->nombre = $postData['nombre'];
        $c->telefono = $postData['telefono'];
        $c->save();
        return redirect()->route('clientes.index');
    }
    public function edit(Cliente $cliente) {
        return Inertia::render('Clientes/Edit', ['client' => $cliente]);
    }
    public function update(Request $request, Cliente $cliente) {
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return redirect()->route('clientes.index');
    }
    public function destroy(Cliente $cliente) {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
    /* public function edit(Producto $producto) {
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
        $producto->codigo_barras = $request->codigo_barras;
        $producto->descripcion = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->existencia = $request->existencia;
        $producto->save();
        return redirect()->route('productos.index');
    } */
}

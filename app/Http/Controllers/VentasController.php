<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Facade\Ignition\ErrorPage\Renderer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VentasController extends Controller
{
    public function index() {
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio) as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
        return Inertia::render('Ventas/Index', ['ventas' => $ventasConTotales]);
    }
    public function show(Request $request) {
        $total = 0;
        echo $request->idv;
        $vent = DB::table('productos_vendidos')->where('id_venta',$request->idv)->get();
        foreach ($vent as $venta) {
            $total += $venta->cantidad * $venta->precio;
        }
        echo $total;
        return Inertia::render('Ventas/Show', ["venta" => $vent,
        "total" => $total]);
    }
}

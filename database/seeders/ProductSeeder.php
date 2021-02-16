<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productos')->delete();
        foreach($this->arrayProductos as $producto) {
            $p = new Producto();
            $p->codigo_barras=$producto['c_b'];
            $p->descripcion=$producto['desc'];
            $p->precio_compra=$producto['p_compra'];
            $p->precio_venta=$producto['p_venta'];
            $p->existencia=$producto['cantidad'];
            $p->save();
        }
    }
    private $arrayProductos = array (
        array(
            'c_b' => '101',
            'desc' => 'mouse raizen',
            'p_compra' => '34000',
            'p_venta' => '40000',
            'cantidad' => '15',
        ),
        array(
            'c_b' => '102',
            'desc' => 'mouse logitech',
            'p_compra' => '14000',
            'p_venta' => '20000',
            'cantidad' => '10',
        ),
        array(
            'c_b' => '103',
            'desc' => 'teclado raizen',
            'p_compra' => '54000',
            'p_venta' => '70000',
            'cantidad' => '5',
        ),
        array(
            'c_b' => '104',
            'desc' => 'monitor LG',
            'p_compra' => '100000',
            'p_venta' => '130000',
            'cantidad' => '3',
        ),
    );
}

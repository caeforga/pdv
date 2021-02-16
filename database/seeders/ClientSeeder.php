<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->delete();
        foreach($this->arrayClientes as $cliente) {
            $c = new Cliente();
            $c->nombre=$cliente['nom'];
            $c->telefono=$cliente['tel'];
            $c->save();
        }
    }
    private $arrayClientes = array (
        array(
            'nom' => 'william zambrano',
            'tel' => '3201458756',
        ),
        array(
            'nom' => 'carlos ortiz',
            'tel' => '2155952543',
        ),
        array(
            'nom' => 'yessica delgado',
            'tel' => '3132760906',
        ),
        array(
            'nom' => 'pablo escobar',
            'tel' => '3156487966',
        ),
    );
}

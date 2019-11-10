<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
         public function run()
         {
             $estado = new Estado();
             $estado->name = 'pendiente';
             $estado->description = 'pendiente';
             $estado->save();

             $estado = new Estado();
             $estado->name = 'aceptado';
             $estado->description = 'aceptado';
             $estado->save();
             $estado = new Estado();
             $estado->name = 'cancelado';
             $estado->description = 'cancelado';
             $estado->save();

             $estado = new Estado();
             $estado->name = 'rechazado';
             $estado->description = 'rechazado';
             $estado->save();
         }

        //

}

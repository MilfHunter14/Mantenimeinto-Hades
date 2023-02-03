<?php

namespace Database\Seeders;

//Se requiere del Modelo para ejecutarlo
use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     //Herramienta que nos permite precargar datos a la BD
    public function run()
    {
        Empleado::create(['nombre' => 'Angel', 'apellidos' => 'Diaz', 'genero' => 'M', 'telefono' => '3393485939', 'calle' => 'Ciruelos #22', 'colonia' => 'Geovillas Los Olivos', 'municipio' => 'Tlaquepaque', 'fecha_nac' => '2002-01-24', 'estado_civil' => 'Soltero', 'email' => 'angel123@gmail.com']);
        Empleado::create(['nombre' => 'Fernando', 'apellidos' => 'Medina', 'genero' => 'M', 'telefono' => '3356789209', 'calle' => 'Hidalgo #543', 'colonia' => 'Independencia', 'municipio' => 'Zapopan', 'fecha_nac' => '2002-07-14', 'estado_civil' => 'Viudo', 'email' => 'fercho550.medina@gmail.com']);
        Empleado::create(['nombre' => 'Cynthia', 'apellidos' => 'Esparza', 'genero' => 'F', 'telefono' => '3385985401', 'calle' => 'Santa Maria #763', 'colonia' => 'Prados del Nilo', 'municipio' => 'Guadalajara', 'fecha_nac' => '2004-08-12', 'estado_civil' => 'Casado', 'email' => 'cynthia@gmail.com']);
    }
}

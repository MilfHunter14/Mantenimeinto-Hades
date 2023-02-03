<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sneaker;

class SneakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sneaker::create(['nombre' => 'PEGASUS', 'marca' => 'NIKE', 'precio' => '7000', 'talla' => '27 - 29', 'stock' => '10']);
        Sneaker::create(['nombre' => 'AIR MAX 90', 'marca' => 'NIKE', 'precio' => '4000', 'talla' => '23 - 30', 'stock' => '20']);
        Sneaker::create(['nombre' => 'AIR MAX 2015', 'marca' => 'NIKE', 'precio' => '3500', 'talla' => '23 - 27.5', 'stock' => '7',]);
    }
}

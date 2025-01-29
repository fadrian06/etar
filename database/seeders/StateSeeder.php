<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [1, 'Amazonas', 'VE-X'],
            [2, 'Anzoátegui', 'VE-B'],
            [3, 'Apure', 'VE-C'],
            [4, 'Aragua', 'VE-D'],
            [5, 'Barinas', 'VE-E'],
            [6, 'Bolívar', 'VE-F'],
            [7, 'Carabobo', 'VE-G'],
            [8, 'Cojedes', 'VE-H'],
            [9, 'Delta Amacuro', 'VE-Y'],
            [10, 'Falcón', 'VE-I'],
            [11, 'Guárico', 'VE-J'],
            [12, 'Lara', 'VE-K'],
            [13, 'Mérida', 'VE-L'],
            [14, 'Miranda', 'VE-M'],
            [15, 'Monagas', 'VE-N'],
            [16, 'Nueva Esparta', 'VE-O'],
            [17, 'Portuguesa', 'VE-P'],
            [18, 'Sucre', 'VE-R'],
            [19, 'Táchira', 'VE-S'],
            [20, 'Trujillo', 'VE-T'],
            [21, 'La Guaira', 'VE-W'],
            [22, 'Yaracuy', 'VE-U'],
            [23, 'Zulia', 'VE-V'],
            [24, 'Distrito Capital', 'VE-A'],
            [25, 'Dependencias Federales', 'VE-Z']
        ];

        foreach ($states as [$id, $name, $iso]) {
            State::insert(compact('id', 'name', 'iso') + ['user_id' => 1]);
        }
    }
}

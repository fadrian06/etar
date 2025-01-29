<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            PeriodSeeder::class,
            SubjectCategorySeeder::class,
            YearSeeder::class,
        ]);

        User::insert([
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Admin.123')
        ]);
        // \App\Models\User::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $ordinal) {
            $year = new Year([
                'ordinal' => $ordinal,
                'user_id' => 1
            ]);

            $year->save();
            $year->sections()->create(['letter' => 'A', 'user_id' => 1]);
        }
    }
}

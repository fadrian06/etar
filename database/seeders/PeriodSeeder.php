<?php

namespace Database\Seeders;

use App\Models\Period;
use DateInterval;
use DateTimeImmutable;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateStart = new DateTimeImmutable;

        $period = new Period([
            'date_start' => $dateStart->format('Y-m-d'),
            'date_end' => $dateStart->add(new DateInterval('P1Y'))->format('Y-m-d'),
            'user_id' => 1
        ]);

        $period->save();
        $period->moments()->createMany([
            ['ordinal' => 1, 'user_id' => 1],
            ['ordinal' => 2, 'user_id' => 1],
            ['ordinal' => 3, 'user_id' => 1],
        ]);
    }
}

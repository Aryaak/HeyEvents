<?php

namespace Database\Seeders;

use App\Models\EventStatus;
use Illuminate\Database\Seeder;

class EventStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventStatus::create([
            'id' => 1,
            'name' => 'Berbayar'
        ]);

        EventStatus::create([
            'id' => 2,
            'name' => 'Gratis'
        ]);
    }
}

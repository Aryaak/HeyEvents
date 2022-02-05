<?php

namespace Database\Seeders;

use App\Models\EventUserStatus;
use Illuminate\Database\Seeder;

class EventUserStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventUserStatus::create([
            'id' => 1,
            'name' => 'Tergabung'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStatus::create([
            'id' => 1,
            'name' => 'Terverifikasi'
        ]);

        UserStatus::create([
            'id' => 2,
            'name' => 'Tertunda'
        ]);

        UserStatus::create([
            'id' => 3,
            'name' => 'Belum Terverifikasi'
        ]);
    }
}

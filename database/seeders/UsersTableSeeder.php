<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => '1',
            'name' => 'Admin HeyEvents',
            'address' => 'Surabaya, Jawa Timur',
            'email' => 'admin@heyevents.com',
            'email_verified_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'password' => bcrypt('secret123')
        ]);
    }
}

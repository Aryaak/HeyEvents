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
            'id' => 1,
            'role_id' => 1,
            'status_id' => 1,
            'photo' => 'default/2.png',
            'name' => 'Admin HeyEvents',
            'slug' => 'admin-heyEvents',
            'bio' => 'Superadmin',
            'address' => 'Surabaya, Jawa Timur',
            'email' => 'admin@heyevents.com',
            'email_verified_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'password' => bcrypt('secret123')
        ]);

        User::create([
            'id' => 2,
            'role_id' => 2,
            'status_id' => 1,
            'photo' => 'default/ampersand.jpg',
            'name' => 'Ampersand',
            'slug' => 'ampersand',
            'bio' => 'Perusahaan Teknologi',
            'address' => 'Surabaya, Jawa Timur',
            'email' => 'ampersand@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'password' => bcrypt('secret123')
        ]);

        User::create([
            'id' => 3,
            'role_id' => 2,
            'status_id' => 1,
            'photo' => 'default/adi.jpg',
            'name' => 'Adi Cipto',
            'slug' => 'adi-cipto',
            'bio' => 'Kepala Sekolah',
            'address' => 'Surabaya, Jawa Timur',
            'email' => 'adicipto@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'password' => bcrypt('secret123')
        ]);

        User::create([
            'id' => 4,
            'role_id' => 2,
            'photo' => 'default/warkop.jpg',
            'name' => 'Warkop GH',
            'slug' => 'warkop-gh',
            'bio' => 'Warung Kopi',
            'address' => 'Solo, Jawa Tengah',
            'email' => 'warkopgh@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'password' => bcrypt('secret123')
        ]);
    }
}

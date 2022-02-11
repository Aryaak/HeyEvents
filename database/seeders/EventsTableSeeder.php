<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Event::create([
            'id' => 1,
            'photo' => 'default/osis.jpg',
            'user_id' => 3,
            'name' => 'Pemilihan Calon MPK-OSIS 2022',
            'slug' => 'pemilihan-calon-mpk-osis-2022',
            'description' => 'Gunakan hak suaramu dan berdemokrasi di SMKN 1 Surabaya. Pilihanmu akan merubah lorem  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit, exercitationem qui provident molestiae quasi quis consectetur ullam sint amet atque, natus libero eligendi error voluptas! Nam alias at iure!',
            'address' => 'SMKN 1 Surabaya',
            'date' => '2022-12-02',
            'quota' => 894,
            'category_id' => 1,
            'status_id' => 2
        ]);

        DB::table('event_user')->insert([
            'event_id' => 1,
            'user_id' => 3,
            'status_id' => 1,
        ]);

        Event::create([
            'id' => 2,
            'photo' => 'default/coding.jpg',
            'user_id' => 3,
            'name' => 'SMK Coding Surabaya 2022',
            'slug' => 'smk-coding-surabaya-2022',
            'description' => 'SMK Coding Surabaya merupakan pelatihan siswa jurusan RPL yang diselenggarakan seti lorem  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit, exercitationem qui provident molestiae quasi quis consectetur ullam sint amet atque, natus libero eligendi error voluptas! Nam alias at iure! Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'address' => 'SMKN 1 Surabaya',
            'date' => '2022-08-02',
            'quota' => 58,
            'category_id' => 1,
            'status_id' => 2
        ]);

        DB::table('event_user')->insert([
            'event_id' => 2,
            'user_id' => 3,
            'status_id' => 1,
        ]);

        Event::create([
            'id' => 3,
            'photo' => 'default/lomba.jpg',
            'user_id' => 3,
            'name' => 'Lomba Cyber Security Pelajar',
            'slug' => 'lomba-cyber-security-pelajar',
            'description' => 'SMK Coding Surabaya merupakan pelatihan siswa jurusan RPL yang diselenggarakan seti lorem  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit, exercitationem qui provident molestiae quasi quis consectetur ullam sint amet atque, natus libero eligendi error voluptas! Nam alias at iure! Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'address' => 'SMKN 1 Surabaya',
            'date' => '2022-08-02',
            'quota' => 12,
            'category_id' => 1,
            'status_id' => 1,
            'price' => 50000
        ]);

        DB::table('event_user')->insert([
            'event_id' => 3,
            'user_id' => 3,
            'status_id' => 1,
        ]);

        Event::create([
            'id' => 4,
            'photo' => 'default/nobar.jpg',
            'user_id' => 4,
            'name' => 'Nobar Persebaya vs PSS Sleman',
            'slug' => 'nobar-persebaya-vs-pss-sleman',
            'description' => 'Yok rek join nobar Persebaya vs PSS di warkop greenhouse. Gratis mie dan esteh setiap pe seti lorem  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit, exercitationem qui provident molestiae quasi quis consectetur ullam sint amet atque, natus libero eligendi error voluptas! Nam alias at iure! Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'address' => 'SMKN 1 Surabaya',
            'date' => '2022-02-28 00:00:00',
            'quota' => 70,
            'category_id' => 1,
            'status_id' => 2,
        ]);

        DB::table('event_user')->insert([
            'event_id' => 4,
            'user_id' => 4,
            'status_id' => 1,
        ]);

        Event::create([
            'id' => 5,
            'photo' => 'default/pendaftaran.jpg',
            'user_id' => 2,
            'name' => 'Pendaftaran Volunteer',
            'slug' => 'pendaftaran-volunteer',
            'description' => 'Kami dari Ampersand Team membuka pendaftaran volunteer untuk seti lorem  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit, exercitationem qui provident molestiae quasi quis consectetur ullam sint amet atque, natus libero eligendi error voluptas! Nam alias at iure! Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'address' => 'SMKN 1 Surabaya',
            'date' => '2022-11-30 00:00:00',
            'quota' => 5,
            'category_id' => 1,
            'status_id' => 2,
        ]);

        DB::table('event_user')->insert([
            'event_id' => 5,
            'user_id' => 2,
            'status_id' => 1,
        ]);

        Event::create([
            'id' => 6,
            'photo' => 'default/donasi.jpg',
            'user_id' => 2,
            'name' => 'Seminar Donasi Bencana Alam',
            'slug' => 'seminar-donasi-bencana-alam',
            'description' => 'Kami dari Ampersand Team membuka seminar untuk donasi bencana alam untuk seti lorem  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam reprehenderit, exercitationem qui provident molestiae quasi quis consectetur ullam sint amet atque, natus libero eligendi error voluptas! Nam alias at iure! Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'address' => 'https://meet.google.com/dfx-atgo-rew',
            'date' => '2022-08-30 00:00:00',
            'quota' => 200,
            'category_id' => 2,
            'status_id' => 2,
        ]);

        DB::table('event_user')->insert([
            'event_id' => 6,
            'user_id' => 2,
            'status_id' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name'     => 'Boi Gia Trang (master)',
            'email'    => 'baogiatrang4b@gmail.com',
            'password' => bcrypt('asdadsa2727'),
            'is_admin' => 1,
        ]);
    }
}

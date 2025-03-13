<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'pegawai_id' => '100001'
            ],
            [
                'username' => 'user2',
                'email' => 'user2@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'pegawai_id' => '100002'
            ],
            [
                'username' => 'user3',
                'email' => 'user3@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'pegawai_id' => '100003'
            ],
            [
                'username' => 'user4',
                'email' => 'user4@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'pegawai_id' => '100004'
            ],
            [
                'username' => 'user5',
                'email' => 'user5@example.com',
                'password' => bcrypt('password123'),
                'role' => 'user',
                'pegawai_id' => '100005'
            ],
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'pegawai_id' => '100006'
            ]
        ];

        DB::table('users')->insert($users);
    }
}

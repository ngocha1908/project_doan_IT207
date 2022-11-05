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
        $users = [
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt("123456"),
                'fullname' => 'Administrator',
                'phone' => '0123456789',
                'status' => '1',
                'email_verified_at' => now(),
                'role_id' => 1,
            ],
            [
                'email' => 'dvson@gmail.com',
                'password'=>bcrypt("123456"),
                'fullname' => 'Đào Vĩnh Sơn',
                'phone' => '0101010101',
                'status' => '1',
                'email_verified_at' => now(),
                'role_id' => 1,
            ],
            [
                'email' => 'nguyenvana@gmail.com',
                'password' => bcrypt("123456"),
                'fullname' => 'Nguyễn Văn A',
                'phone' => '0123456780',
                'status' => '1',
                'email_verified_at' => now(),
                'role_id' => 2,
            ],
            [
                'email' => 'nguyenvanb@gmail.com',
                'password' => bcrypt("123456"),
                'fullname' => 'Nguyễn Văn B',
                'phone' => '0123456787',
                'status' => '1',
                'email_verified_at' => now(),
                'role_id' => 1,
            ],
            [
                'fullname' => 'Nguyễn Văn C',
                'password' => bcrypt("123456"),
                'email' => 'nguyenvanc@gmail.com',
                'phone' => '0123451234',
                'status' => '1',
                'email_verified_at' => now(),
                'role_id' => 2,
            ],
            [
                'email' => 'nguyenvand@gmail.com',
                'password'=>bcrypt("123456"),
                'fullname' => 'Nguyễn Văn D',
                'phone' => '0123453489',
                'status' => '1',
                'email_verified_at' => now(),
                'role_id' => 2,
            ],
        ];
        DB::table('users')->delete();
        DB::table('users')->insert($users);
    }
}

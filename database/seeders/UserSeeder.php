<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'LDC/UDC',
            'mobile_no' => '9999999901',
            'email' => 'ldc@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'LDC',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Assistant',
            'mobile_no' => '9999999902',
            'email' => 'assistant@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'Assistant',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Suprintendent',
            'mobile_no' => '9999999903',
            'email' => 'suprintendent@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'Suprintendent',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'SDPO Silvassa',
            'mobile_no' => '9999999904',
            'email' => 'sdpo@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'SDPO',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Mamlatdar Silvassa',
            'mobile_no' => '9999999905',
            'email' => 'mamlatdar@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'Mamlatdar',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'RDC',
            'mobile_no' => '9999999906',
            'email' => 'rdc@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'RDC',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'SDPO Khanvel',
            'mobile_no' => '9999999910',
            'email' => 'sdpokhn@gmail.com',
            'district' => 'Khanvel',
            'user_type' => 'SDPO',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Mamlatdar Khanvel',
            'mobile_no' => '9999999911',
            'email' => 'mamlatdarkhn@gmail.com',
            'district' => 'Khanvel',
            'user_type' => 'Mamlatdar',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$PP0IyRsaK1COkyGsfWKIneFvWkomNK1y9uHn9cQyc9Z9BhacXP.Xe',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Administrator',
            'mobile_no' => '9999999913',
            'email' => 'admin@gmail.com',
            'district' => 'Silvassa',
            'user_type' => 'Admin',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$K30bPFWuKV2btfLN8BGhTeLbp/NlTM.lQU2T3KmpFEXlC1OXiM9x2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'is_email_verified' => 1
        ]);
    }
}

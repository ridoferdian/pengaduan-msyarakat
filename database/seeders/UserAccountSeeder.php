<?php

namespace Database\Seeders;

use App\Models\UserAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAccount::insert([
            [
            'name' => 'rido',
            'nik' => '23423423423',
            'username' => 'rido',
            'email' => 'admin@admin',
            'password' => Hash::make('123'),
            'role' => 'user',
            'telp' => '0812325543',
            'agency_id' => '1'
            ],
            [
            'name' => 'ferdian',
            'nik' => '23423423423',
            'username' => 'ferdian',
            'email' => 'admin@admin',
            'password' => Hash::make('123'),
            'role' => 'admin_agency',
            'telp' => '0812325543',
            'agency_id' => '2'
            ],
            [
            'name' => 'krisna',
            'nik' => '23423423423',
            'username' => 'krisna',
            'email' => 'admin@admin',
            'password' => Hash::make('123'),
            'role' => 'admin_agency',
            'telp' => '0812325543',
            'agency_id' => '3'
            ],
        ]);
    }
}
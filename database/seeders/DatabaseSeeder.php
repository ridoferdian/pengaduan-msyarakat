<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\Admin_Instansi\AdminAgency;
use App\Models\Message;
use App\Models\People;
use App\Models\Officer;
use App\Models\UserAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            OfficerSeeder::class,
            CategorySeeder::class,
            AgencySeeder::class,
            UserAccountSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
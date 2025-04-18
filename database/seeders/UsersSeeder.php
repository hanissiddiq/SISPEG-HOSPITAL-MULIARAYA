<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // for ($i = 0; $i < 10; $i++) {

        // }

        // Buat 3 Admin
        Users::factory()->count(3)->create([
            'role' => 1
        ]);

        // Buat 7 User
        Users::factory()->count(7)->create([
            'role' => 2
        ]);
    }
}

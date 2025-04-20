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
        Users::create(array(
            'name'              => 'Administrator Sispega',
            'email'             => 'admin@sispega.com',
            'email_verified_at'  => '2025-04-20 05:25:30',
            'password'          => bcrypt('mantap'),
            'foto'              => 'avatar.png',
            'nik'               => '11111153103980005',
            'tgl_lahir'         => '1998-03-31',
            'jenis_kelamin'     => 'Pria',
            'telp'              => '082211887735',
            'alamat'            => 'Bireuen',
            'status_pegawai'    => 'Kontrak',
            'tgl_masuk'         => '2025-04-20',
            'role'              => '0',
        ));


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

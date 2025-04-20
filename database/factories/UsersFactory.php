<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UsersFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Defaultfactory dari laravel
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];
        $rawPassword = 'password123';

        return [
            'name'              => fake('id_ID')->name(),
            'email'             => fake('id_ID')->unique()->safeEmail(),
            'email_verified_at' => now(),
            // 'password'          => Hash::make("password123"),
            'password'          => Hash::make($rawPassword),
            'remember_token'    => Str::random(10),
            'nik'               => fake()->numerify('111##########'),
            'tgl_lahir'         => fake()->date('Y-m-d', '-20 years'),
            'jenis_kelamin'     => fake()->randomElement(['Pria', 'Wanita']),
            'telp'              => '08' . fake()->numerify('##########'),
            'alamat'            => fake('id_ID')->address(),
            'status_pegawai'    => fake()->randomElement(['Karyawan Tetap', 'Kontrak', 'Honor', 'PNS']),
            'tgl_masuk'         => fake()->date('Y-m-d', '-1 years'),
            'role'              => fake()->numberBetween(0, 2), // 0 = Super Admin, 1 = Admin, 2 = User
            'foto'              => 'https://i.pravatar.cc/150?u=' . fake()->unique()->safeEmail(), // dummy foto
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

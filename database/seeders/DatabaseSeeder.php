<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Nursery;
use App\Models\Organisation;
use App\Models\User;
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

        User::factory()->create([
            'name'     => 'Dave',
            'role'     => 'Super',
            'email'    => 'dave@email.com',
            'password' => Hash::make('davedave')
        ]);

        Organisation::factory()
            ->has(
                User::factory([
                    'name'     => 'Blanche',
                    'role'     => 'Admin',
                    'email'    => 'blanche@email.com',
                    'password' => Hash::make('davedave')
                ])->count(1))
            ->has(Nursery::factory()->count(20))
            ->create();

        Organisation::factory()
            ->has(
                User::factory([
                    'role'     => 'Admin',
                    'password' => Hash::make('davedave')
                ])->count(1))
            ->has(Nursery::factory()->count(2))
            ->create();
    }
}

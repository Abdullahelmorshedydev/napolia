<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Admin::create([
            'name' => 'Morshedy',
            'email' => 'morshedy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('morshedy'),
            'remember_token' => Str::random(10),
        ]);

    }
}

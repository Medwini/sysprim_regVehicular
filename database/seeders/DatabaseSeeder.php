<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MarcasM;
use App\Models\ModelosM;
use App\Models\VehiculosM;

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

        MarcasM::factory(8)->create();
        ModelosM::factory(8)->create();
        VehiculosM::factory(10)->create();
    }
}

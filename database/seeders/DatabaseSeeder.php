<?php

namespace Database\Seeders;

use Eclipse\Core\Database\Seeders\CoreSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Filament Shield plugin seeder
        $this->call(ShieldSeeder::class);

        // Core seeder
        $this->call(CoreSeeder::class);
    }
}

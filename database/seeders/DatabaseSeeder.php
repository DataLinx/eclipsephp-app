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
        // Core seeder
        $this->call(CoreSeeder::class);
    }
}

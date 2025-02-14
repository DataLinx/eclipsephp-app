<?php

namespace Database\Seeders;

use Eclipse\Core\Database\Seeders\CoreSeeder;
use Eclipse\Core\Database\Seeders\RolesAndPermissionsSeeder;
use Eclipse\Core\Models\Site;
use Eclipse\Core\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Core seeder
        $this->call(CoreSeeder::class);

        // Create main site
        $site = Site::create([
            'domain' => basename(config('app.url')),
            'name' => config('app.name'),
        ]);

        setPermissionsTeamId($site->id);

        // User roles and permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Create test user with super_admin role
        $user = User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@datalinx.si',
            'password' => Hash::make('test123'),
        ]);

        // Assign user to the main site
        $user->sites()->attach(Site::all());

//        $user->assignRole('super_admin')->save();

        // Create an additional batch of users
        User::factory(10)->create();
    }
}

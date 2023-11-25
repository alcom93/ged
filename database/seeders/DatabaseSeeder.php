<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Document;
use App\Models\DocumentUserPermission;
use Database\Factories\DocumentPermissionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
         $this->call([
            CategorySeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        Document::factory(10)->create();
      DocumentUserPermission::factory(30)->create();
    }

}

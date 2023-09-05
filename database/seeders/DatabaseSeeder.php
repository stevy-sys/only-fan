<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Seeder;

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
        // $this->call([
        //     UserSeeder::class,
        //     ProductSeeder::class,
        // ]);
        $jsonmenupath = storage_path('app/public/menu.json');
        $jsonrolepath = storage_path('app/public/role.json');
        
        if (file_exists($jsonmenupath)) {
            $jsonContents = file_get_contents($jsonmenupath);
            $menuData = json_decode($jsonContents, true);
            foreach ($menuData as $menu) {
                Menu::create($menu);
            }
        } 
        if (file_exists($jsonrolepath)) {
            $jsonContents = file_get_contents($jsonrolepath);
            $roleData = json_decode($jsonContents, true);
            foreach ($roleData as $role) {
                Role::create($role);
            }
        } 

    }
}

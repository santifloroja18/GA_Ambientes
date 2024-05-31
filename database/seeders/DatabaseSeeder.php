<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
<<<<<<< HEAD
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            FloorSeeder::class,
            ElementSeeder::class
        ]);
=======
        $this -> call(RoleSeeder::class);
        $this -> call(UserSeeder::class);
>>>>>>> d55da4ad765efae44a7e720b81fc69c0e2bf7077
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'cesar',
            'email' => 'cesar@bludpii.com',
            'password' => bcrypt('12345Ana')

        ]) -> assignRole('administrador');

        // User::create([
        //     'name' => 'Yeison Zapata Monsalve',
        //     'email' => 'ydzapata@sena.edu.co',
        //     'password' => bcrypt('Y3is0nZ4p4t4')

        // ]) -> assignRole('Admin');
        
        // User::create([
        //     'name' => 'Cata',
        //     'email' => 'cata@gmail.com',
        //     'password' => bcrypt('12345678')
            
        // ]) -> assignRole('Instructor');
    }
}

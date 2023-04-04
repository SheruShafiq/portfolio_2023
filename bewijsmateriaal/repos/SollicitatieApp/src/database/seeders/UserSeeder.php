<?php

namespace Database\Seeders;

use App\Models\Investment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->has(Project::factory()->count(10))->has(Investment::factory()->count(20))->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.org',
            'password' => '$2y$10$eRBjpJthcJpx5/J0P24NtOcMAJ1NeRPWJuLa.yyBDsV7wkLTF0aHC', // secret
        ]);
    }
}

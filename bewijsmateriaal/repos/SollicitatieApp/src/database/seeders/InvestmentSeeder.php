<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Models\Investment;
use App\Models\Project;
use Illuminate\Database\Seeder;

class InvestmentSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::where('status', '!=', ProjectStatus::Pending)->get();

        foreach ($projects as $project) {
            Investment::factory(10)->for($project)->create();
        }
    }
}

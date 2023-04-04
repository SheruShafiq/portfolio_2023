<?php

namespace App\Policies;

use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function view(Project $project): bool
    {
        if ($project->is_pending && ! $project->belongs_to_current_user) {
            return false;
        }

        return true;
    }

    public function update(Project $project): bool
    {
        return $project->belongs_to_current_user;
    }
}

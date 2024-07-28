<?php

namespace App\Policies;

use App\Models\User;
use App\Models\projects\Project;
use Illuminate\Auth\Access\Response;

class ProjectsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Project $projects): bool
    {
        return $user->id === $projects->user_id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Project $projects): bool
    {
        return $user->id === $projects->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $projects): bool
    {
        return $user->id === $projects->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $projects): bool
    {
        return $user->is_Admin || $user->id === $projects->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $projects): bool
    {
        return $user->isAdmin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $projects): bool
    {
        return $user->isAdmin;
    }
}

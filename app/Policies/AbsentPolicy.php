<?php

namespace App\Policies;

use App\AbsentApplication;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbsentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\AbsentApplication  $absentApplication
     * @return mixed
     */
    public function view(User $user, AbsentApplication $absentApplication)
    {
        //
        if ($user->role == "worker") {
            return $user->id === $absentApplication->user_id;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\AbsentApplication  $absentApplication
     * @return mixed
     */
    public function update(User $user, AbsentApplication $absentApplication)
    {
        //
        if ($user->role == "worker") {
            return $user->id === $absentApplication->user_id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\AbsentApplication  $absentApplication
     * @return mixed
     */
    public function delete(User $user, AbsentApplication $absentApplication)
    {
        //
        if ($user->role == "worker") {
            return $user->id === $absentApplication->user_id;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\AbsentApplication  $absentApplication
     * @return mixed
     */
    public function restore(User $user, AbsentApplication $absentApplication)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\AbsentApplication  $absentApplication
     * @return mixed
     */
    public function forceDelete(User $user, AbsentApplication $absentApplication)
    {
        //
    }

    public function approve(User $user, AbsentApplication $absent)
    {
        //
        // dd();
        if ($user->role == "manager") {
            return (count($absent->user->projects()->where('managed', $user->id)->get()) > 0);
        }

        return false;
    }

    public function reject(User $user, AbsentApplication $absent)
    {
        //
        if ($user->role == "manager") {
            return (count($absent->user->projects()->where('managed', $user->id)->get()) > 0);
        }

        return false;
    }
}

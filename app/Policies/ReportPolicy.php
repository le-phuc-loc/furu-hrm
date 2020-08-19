<?php

namespace App\Policies;

use App\Report;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
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
     * @param  \App\Report  $report
     * @return mixed
     */
    public function view(User $user, Report $report)
    {
        //
        if ($user->role == "manager") {
            return $user->id === $report->project_user->project->managed;
        }

        if ($user->role == "worker") {
            return $user->id === $report->project_user->user_id;
        }

        return true;
    }

    public function approve(User $user, Report $report, User $user_mail)
    {
        //
        if ($user->role == "manager") {
            return $user->id === $report->project_user->project->managed && $user_mail->id === $report->project_user->user_id;
        }

        return true;
    }

    public function reject(User $user, Report $report, User $user_mail)
    {
        //
        if ($user->role == "manager") {
            return $user->id === $report->project_user->project->managed && $user_mail->id === $report->project_user->user_id;
        }

        return true;
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
     * @param  \App\Report  $report
     * @return mixed
     */
    public function update(User $user, Report $report)
    {
        //
        if ($user->role == "worker") {
            return $user->id === $report->project_user->user_id;
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function delete(User $user, Report $report)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function restore(User $user, Report $report)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function forceDelete(User $user, Report $report)
    {
        //
    }
}

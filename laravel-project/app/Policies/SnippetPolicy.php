<?php

namespace App\Policies;

use App\Models\Snippet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SnippetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    public function viewall(?User $user)
    {
        if ($user){
            if($user->isWebAdmin()){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Snippet $snippet)
    {
        if(is_null($user)){
            return $snippet->isApproved();
        }else{
            return ($user->isWebAdmin() || $user->isOwner($snippet));
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isOrAbove('user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Snippet $snippet)
    {
        return $user->isWebAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Snippet $snippet)
    {
        return $user->isWebAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Snippet $snippet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Snippet $snippet)
    {
        //
    }
}

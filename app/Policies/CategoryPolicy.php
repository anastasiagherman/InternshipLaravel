<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(?User $user){
        return $user != null;
    }

    public function edit(?User $user, Category $category){
        return $this->update($user, $category);
    }
    public function update(?User $user){
        return $user != null;
    }
}

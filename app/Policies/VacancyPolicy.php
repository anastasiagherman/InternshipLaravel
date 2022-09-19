<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacancyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function create(?User $user){
        return $user != null;
    }

    public function edit(?User $user, Vacancy $vacancy){
        return $this->update($user, $vacancy);
    }
    public function update(?User $user){
        return $user != null;
    }
}

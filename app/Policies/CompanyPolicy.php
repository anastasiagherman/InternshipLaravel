<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
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

    public function edit(?User $user, Company $company){
        return $this->update($user, $company);
    }
    public function update(?User $user){
        return $user != null;
    }
}

<?php

namespace App\Services;

    /*
     * Class UserService
     * @package App\Services
     * */

    use App\User;

    class UserService
{

    /*
    * Get List of users.
    * @return object $users.
    * *
    */
    public function getUsersList()
    {
        $users = User::paginate(User::PER_PAGE);
        return $users;
    }
    
}
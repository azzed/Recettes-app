<?php
/**
 * Created by PhpStorm.
 * User: azzedine
 * Date: 03/06/18
 * Time: 09:53
 */

namespace App\Security;


class Voters
{
    public function isOwner($user, $subject)
    {
        if($this->isAdmin($user)){
            return true;
        }
        return $user->getId() == $subject->getUserId();
    }

    public function isAdmin($user)
    {
        return 'admin' == $user->getRole();
    }
}
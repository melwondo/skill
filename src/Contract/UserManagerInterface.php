<?php

namespace App\Contract;

use App\Entity\User;

interface UserManagerInterface
{
    /**
     * @param User $user
     * @param bool $flush
     */
    public function createOrUpdate(User $user, bool $flush = true): void;

    /**
     * @param User $user
     */
    public function remove(User $user): void;
}
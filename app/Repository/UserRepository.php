<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param User $user
     */
    #[Pure]
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}

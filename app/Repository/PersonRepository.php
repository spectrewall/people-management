<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interfaces\PersonRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface
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

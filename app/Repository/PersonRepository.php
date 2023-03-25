<?php

namespace App\Repository;

use App\Models\Person;
use App\Repository\Interfaces\PersonRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class PersonRepository extends BaseRepository implements PersonRepositoryInterface
{
    /**
     * @param Person $person
     */
    #[Pure]
    public function __construct(Person $person)
    {
        parent::__construct($person);
    }
}

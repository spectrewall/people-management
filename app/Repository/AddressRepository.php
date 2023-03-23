<?php

namespace App\Repository;

use App\Models\Address;
use App\Repository\Interfaces\AddressRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    /**
     * @param Address $address
     */
    #[Pure]
    public function __construct(Address $address)
    {
        parent::__construct($address);
    }
}

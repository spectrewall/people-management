<?php

namespace App\Services;

use App\Models\Address;
use App\Repository\Interfaces\AddressRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

class AddressService
{
    public function __construct(
        private readonly AddressRepositoryInterface $addressRepository
    ) {
    }

    /**
     * Create a resource in storage.
     *
     * @param array $attributes
     * @return Address
     * @throws Throwable
     */
    public function create(array $attributes): Address
    {
        return DB::transaction(function () use ($attributes) {
            return $this->addressRepository->create($attributes);
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int|string|Address $address
     * @return Address
     * @throws Throwable
     */
    public function update(array $attributes, int|string|Address $address): Address
    {
        $address = $address instanceof Address ? $address :
            $this->addressRepository->findOrFail(intval($address));

        return DB::transaction(function () use ($address, $attributes) {
            return $this->addressRepository->update($attributes, $address);
        });
    }
}

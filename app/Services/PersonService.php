<?php

namespace App\Services;

use App\Models\Person;
use App\Repository\Interfaces\PersonRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

class PersonService
{
    public function __construct(
        private readonly PersonRepositoryInterface $personRepository,
        private readonly AddressService $addressService
    ) {
    }

    /**
     * Create a resource in storage.
     *
     * @param array $attributes
     * @return Person
     * @throws Throwable
     */
    public function create(array $attributes): Person
    {
        $addressAttributes = $attributes['address'] ?? [];

        return DB::transaction(function () use ($attributes, $addressAttributes) {
            $address =$this->addressService->create($addressAttributes);
            $attributes['address_id'] = $address->id;
            return $this->personRepository->create($attributes);
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int|string|Person $person
     * @return Person
     * @throws Throwable
     */
    public function update(array $attributes, int|string|Person $person): Person
    {
        /** @var Person $person */
        $person = $person instanceof Person ? $person :
            $this->personRepository->findOrFail(intval($person));

        $address = $person->address;
        $addressAttributes = $attributes['address'] ?? [];

        return DB::transaction(function () use ($person, $address, $attributes, $addressAttributes) {
            $this->addressService->update($addressAttributes, $address);
            return $this->personRepository->update($attributes, $person);
        });
    }
}

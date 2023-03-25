<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Repository\Interfaces\PersonRepositoryInterface;
use Illuminate\Contracts\View\View;

class PersonController extends Controller
{
    /**
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(
        private readonly PersonRepositoryInterface $personRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('system.person.index', [
            'people' => $this->personRepository->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        return view('system.person.crud', [
            'titleVerb' => 'Editar',
            'formAction' => route('person.update', $id),
            'person' => $this->personRepository->findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}

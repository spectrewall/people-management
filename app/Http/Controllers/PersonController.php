<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Repository\Interfaces\PersonRepositoryInterface;
use App\Services\PersonService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

class PersonController extends Controller
{
    /**
     * @param PersonRepositoryInterface $personRepository
     * @param PersonService $personService
     */
    public function __construct(
        private readonly PersonRepositoryInterface $personRepository,
        private readonly PersonService $personService
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
     *
     * @param PersonRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(PersonRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();
        $person = $this->personService->update($data, $id);

        return redirect()
            ->route('person.edit', $person->id)
            ->with('success', 'Pessoa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EquipoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $equipos = Equipo::paginate();

        return view('equipo.index', compact('equipos'))
            ->with('i', ($request->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $equipo = new Equipo();

        return view('equipo.create', compact('equipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoRequest $request): RedirectResponse
    {
        Equipo::create($request->validated());

        return Redirect::route('equipos.index')
            ->with('success', 'Equipo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $equipo = Equipo::find($id);

        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $equipo = Equipo::find($id);

        return view('equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoRequest $request, Equipo $equipo): RedirectResponse
    {
        $equipo->update($request->validated());

        return Redirect::route('equipos.index')
            ->with('success', 'Equipo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Equipo::find($id)->delete();

        return Redirect::route('equipos.index')
            ->with('success', 'Equipo deleted successfully');
    }
}

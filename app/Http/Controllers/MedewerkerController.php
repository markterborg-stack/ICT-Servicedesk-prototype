<?php

namespace App\Http\Controllers;

use App\Models\Medewerker;
use Illuminate\Http\Request;

class MedewerkerController extends Controller
{
    public function index()
    {
        $medewerkers = Medewerker::latest()->get();

        return view('medewerkers.index', compact('medewerkers'));
    }

    public function create()
    {
        return view('medewerkers.create');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|unique:medewerkers,email',
            'telefoon' => 'nullable|string|max:20',
            'afdeling' => 'nullable|string|max:255',
            'functie' => 'nullable|string|max:255',
            'locatie' => 'nullable|string|max:255',
        ]);

        Medewerker::create([
            'naam' => $request->naam,
            'email' => $request->email,
            'telefoon' => $request->telefoon,
            'afdeling' => $request->afdeling,
            'functie' => $request->functie,
            'locatie' => $request->locatie,
        ]);

        return redirect()
            ->route('medewerkers.index')
            ->with('success', 'Medewerker is succesvol toegevoegd.');
    }

    public function edit(Medewerker $medewerker)
{
    return view('medewerkers.edit', compact('medewerker'));
}

public function update(Request $request, Medewerker $medewerker)
{
    $request->validate([
        'naam' => 'required|string|max:255',
        'email' => 'required|email|unique:medewerkers,email,' . $medewerker->id,
        'telefoon' => 'nullable|string|max:20',
        'afdeling' => 'nullable|string|max:255',
        'functie' => 'nullable|string|max:255',
        'locatie' => 'nullable|string|max:255',
    ]);

    $medewerker->update([
        'naam' => $request->naam,
        'email' => $request->email,
        'telefoon' => $request->telefoon,
        'afdeling' => $request->afdeling,
        'functie' => $request->functie,
        'locatie' => $request->locatie,
    ]);

    return redirect()
        ->route('medewerkers.index')
        ->with('success', 'Medewerker is succesvol aangepast.');
}

public function destroy(Medewerker $medewerker)
{
    if ($medewerker->tickets()->exists()) {
        return redirect()
            ->route('medewerkers.index')
            ->with('error', 'Deze medewerker kan niet worden verwijderd omdat er nog tickets aan gekoppeld zijn.');
    }

    $medewerker->delete();

    return redirect()
        ->route('medewerkers.index')
        ->with('success', 'Medewerker is succesvol verwijderd.');
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Medewerker;
use App\Models\category;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::with(['medewerker', 'category'])
        ->latest()
        ->get();

        return view ('tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['medewerker', 'category']);

        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $medewerkers = Medewerker::all();
        $categories = Category::all();

        return view('tickets.edit', compact(
            'ticket',
            'medewerkers',
            'categories'
        ));
    }

    public function update(Request $request, Ticket $ticket)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'medewerker_id' => 'required|exists:medewerkers,id',
        'category_id' => 'required|exists:categories,id',
        'priority' => 'required|in:laag,normaal,hoog',
        'status' => 'required|in:open,in behandeling,opgelost',
        'solution' => 'nullable|string',
    ]);

    $ticket->update([
        'title' => $request->title,
        'description' => $request->description,
        'medewerker_id' => $request->medewerker_id,
        'category_id' => $request->category_id,
        'priority' => $request->priority,
        'status' => $request->status,
        'solution' => $request->solution,
    ]);

    return redirect()
        ->route('tickets.show', $ticket)
        ->with('success', 'Ticket is succesvol aangepast.');
}

public function destroy(Ticket $ticket)
{
    $ticket->delete();

    return redirect()
        ->route('tickets.index')
        ->with('success', 'Ticket is succesvol verwijderd.');
}

    public function create()
    {
        $medewerkers = Medewerker::all();
        $categories = Category::all();


        return view('tickets.create', compact(
            'medewerkers', 
            'categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'medewerker_id' => 'required|exists:medewerkers,id',
            'priority' => 'required|in:laag,normaal,hoog',
        ]);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'medewerker_id' => $request->medewerker_id,
            'priority' => $request->priority,
        ]);

        return redirect()
        ->route('dashboard')
        ->with('success', 'Ticket is succesvol aangemaakt.');
    }


}

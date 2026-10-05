<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MedewerkerController;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $opentickets = Ticket::where('status', 'open')->count();
    $inbehandelingtickets = Ticket::where('status', 'in behandeling')->count();
    $opgelosttickets = Ticket::where('status', 'opgelost')->count();


    return view('dashboard', compact(
        'opentickets', 
        'inbehandelingtickets', 
        'opgelosttickets'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tickets/create', [TicketController::class, 'create'])
    ->middleware(['auth'])
    ->name ('tickets.create');

Route::post('/tickets', [TicketController::class, 'store'])
    ->middleware(['auth'])
    ->name('tickets.store');
    
Route::get('/tickets', [TicketController::class, 'index'])
    ->middleware(['auth'])
    ->name('tickets.index');

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->middleware(['auth'])
    ->name('tickets.show');

Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])
    ->middleware(['auth'])
    ->name('tickets.edit');

Route::put('/tickets/{ticket}', [TicketController::class, 'update'])
    ->middleware(['auth'])
    ->name('tickets.update');

Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('tickets.destroy');



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/medewerkers', [MedewerkerController::class, 'index'])
        ->name('medewerkers.index');

    Route::get('/medewerkers/create', [MedewerkerController::class, 'create'])
        ->name('medewerkers.create');

    Route::post('/medewerkers', [MedewerkerController::class, 'store'])
        ->name('medewerkers.store');

    Route::get('/medewerkers/{medewerker}/edit', [MedewerkerController::class, 'edit'])
    ->name('medewerkers.edit');

    Route::put('/medewerkers/{medewerker}', [MedewerkerController::class, 'update'])
    ->name('medewerkers.update');

    Route::delete('/medewerkers/{medewerker}', [MedewerkerController::class, 'destroy'])
    ->name('medewerkers.destroy');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

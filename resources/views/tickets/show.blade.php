<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket bekijken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                     {{ session('success') }}
            </div>
                @endif

                <h3 class="text-2xl font-bold mb-6">
                    {{ $ticket->title }}
                </h3>

                <div class="space-y-4">

                    <div>
                        <strong>Beschrijving:</strong>
                        <p class="mt-1">
                            {{ $ticket->description }}
                        </p>
                    </div>

                    <div>
                        <strong>Medewerker:</strong>
                        <p>
                            {{ $ticket->medewerker->naam }}
                        </p>
                    </div>

                    <div>
                        <strong>Categorie:</strong>
                        <p>
                            {{ $ticket->category->naam }}
                        </p>
                    </div>

                    <div>
                        <strong>Prioriteit:</strong>
                        <p>
                            {{ ucfirst($ticket->priority) }}
                        </p>
                    </div>

                    <div>
                        <strong>Status:</strong>
                        <p>
                            {{ ucfirst($ticket->status) }}
                        </p>
                    </div>

                    @if ($ticket->solution)
                        <div>
                            <strong>Oplossing:</strong>
                            <p>
                                {{ $ticket->solution }}
                            </p>
                        </div>
                    @endif

                </div>

                    <div class="mt-8 flex gap-3">

                        <a href="{{ route('tickets.edit', $ticket) }}"
                             class="bg-gray-800 text-white px-4 py-2 rounded">
                                    Ticket aanpassen
                        </a>

                        <form method="POST" action="{{ route('tickets.destroy', $ticket) }}"
                            onsubmit="return confirm('Weet je zeker dat je dit ticket wilt verwijderen?');">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded">
                                Ticket verwijderen
                            </button>

                         </form>

                        <a href="{{ route('tickets.index') }}"
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                                Terug naar tickets
                        </a>



                    </div>

            </div>

        </div>
    </div>

</x-app-layout>
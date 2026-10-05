<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tickets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
             <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
            </div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">
                        Alle tickets
                    </h3>

                    <a href="{{ route('tickets.create') }}"
                       class="px-4 py-2 bg-gray-800 text-white rounded">
                        + Nieuw ticket
                    </a>
                </div>

                @if ($tickets->count() > 0)

                    <div class="overflow-x-auto">

                        <table class="w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-3">#</th>
                                    <th class="text-left p-3">Titel</th>
                                    <th class="text-left p-3">Medewerker</th>
                                    <th class="text-left p-3">Categorie</th>
                                    <th class="text-left p-3">Prioriteit</th>
                                    <th class="text-left p-3">Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($tickets as $ticket)

                                    <tr class="border-b">

                                        <td class="p-3">
                                            {{ $ticket->id }}
                                        </td>

                                        <td class="p-3">
                                            <a href="{{ route('tickets.show', $ticket) }}"
                                                class="underline">
                                                    {{ $ticket->title }}
                                                </a>
                                         </td>

                                        <td class="p-3">
                                            {{ $ticket->medewerker->naam }}
                                        </td>

                                        <td class="p-3">
                                            {{ $ticket->category->naam }}
                                        </td>

                                        <td class="p-3">
                                            {{ ucfirst($ticket->priority) }}
                                        </td>

                                        <td class="p-3">
                                            {{ ucfirst($ticket->status) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>
                        </table>

                    </div>

                @else

                    <p>
                        Er zijn nog geen tickets.
                    </p>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
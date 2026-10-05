<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Medewerkers
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                     {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border p-6">

                <div class="flex justify-between items-center mb-6">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Medewerkers
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Beheer de medewerkers van de organisatie.
                        </p>
                    </div>

                    <a href="{{ route('medewerkers.create') }}"
                       class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                        + Medewerker toevoegen
                    </a>

                </div>

                @if ($medewerkers->count() > 0)

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-3">Naam</th>
                                    <th class="text-left p-3">E-mail</th>
                                    <th class="text-left p-3">Afdeling</th>
                                    <th class="text-left p-3">Functie</th>
                                    <th class="text-left p-3">Locatie</th>
                                    <th class="text-left p-3">Acties</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($medewerkers as $medewerker)

                                    <tr class="border-b hover:bg-gray-50">

                                        <td class="p-3 font-medium">
                                            {{ $medewerker->naam }}
                                        </td>

                                        <td class="p-3">
                                            {{ $medewerker->email }}
                                        </td>

                                        <td class="p-3">
                                            {{ $medewerker->afdeling ?? '-' }}
                                        </td>

                                        <td class="p-3">
                                            {{ $medewerker->functie ?? '-' }}
                                        </td>

                                        <td class="p-3">
                                            {{ $medewerker->locatie ?? '-' }}
                                        </td>

                                        <td class="p-3">

    <div class="flex gap-2">

        <a
            href="{{ route('medewerkers.edit', $medewerker) }}"
            class="px-3 py-1 bg-gray-800 text-white rounded hover:bg-gray-700"
        >
            Aanpassen
        </a>

        <form
            method="POST"
            action="{{ route('medewerkers.destroy', $medewerker) }}"
            onsubmit="return confirm('Weet je zeker dat je deze medewerker wilt verwijderen?');"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
            >
                Verwijderen
            </button>
        </form>

    </div>

</td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <p class="text-gray-600">
                        Er zijn nog geen medewerkers.
                    </p>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
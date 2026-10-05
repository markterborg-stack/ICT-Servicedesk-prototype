<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            IT Servicedesk
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">
                    Dashboard
                </h1>

                <p class="mt-1 text-gray-600">
                    Overzicht van de huidige servicedesk-tickets.
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-xl shadow-sm border p-6">
                    <p class="text-sm text-gray-500">
                        Open tickets
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-800">
                        {{ $opentickets }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border p-6">
                    <p class="text-sm text-gray-500">
                        In behandeling
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-800">
                        {{ $inbehandelingtickets }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-sm border p-6">
                    <p class="text-sm text-gray-500">
                        Opgelost
                    </p>

                    <p class="mt-2 text-3xl font-bold text-gray-800">
                        {{ $opgelosttickets }}
                    </p>
                </div>

            </div>

            <div class="mt-8 bg-white rounded-xl shadow-sm border p-6">

                <h2 class="text-lg font-semibold text-gray-800">
                    Tickets beheren
                </h2>

                <p class="mt-2 text-gray-600">
                    Bekijk bestaande tickets of maak een nieuw ticket aan.
                </p>

                <div class="mt-5 flex gap-3">

                    <a href="{{ route('tickets.index') }}"
                       class="px-5 py-2.5 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                        Bekijk tickets
                    </a>

                    <a href="{{ route('tickets.create') }}"
                       class="px-5 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                        Nieuw ticket
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
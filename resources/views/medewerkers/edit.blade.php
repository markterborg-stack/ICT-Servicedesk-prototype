<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Medewerker aanpassen
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm border p-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-6">
                    Medewerker aanpassen
                </h3>

                <form method="POST" action="{{ route('medewerkers.update', $medewerker) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Naam
                        </label>

                        <input
                            type="text"
                            name="naam"
                            value="{{ old('naam', $medewerker->naam) }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            E-mail
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $medewerker->email) }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Telefoon
                        </label>

                        <input
                            type="text"
                            name="telefoon"
                            value="{{ old('telefoon', $medewerker->telefoon) }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Afdeling
                        </label>

                        <input
                            type="text"
                            name="afdeling"
                            value="{{ old('afdeling', $medewerker->afdeling) }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Functie
                        </label>

                        <input
                            type="text"
                            name="functie"
                            value="{{ old('functie', $medewerker->functie) }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700">
                            Locatie
                        </label>

                        <input
                            type="text"
                            name="locatie"
                            value="{{ old('locatie', $medewerker->locatie) }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="px-5 py-2.5 bg-gray-800 text-white rounded-lg hover:bg-gray-700"
                        >
                            Wijzigingen opslaan
                        </button>

                        <a
                            href="{{ route('medewerkers.index') }}"
                            class="px-5 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300"
                        >
                            Annuleren
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
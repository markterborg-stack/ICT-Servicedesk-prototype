<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuw ticket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('tickets.store') }}">

                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Titel
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                            placeholder="Bijvoorbeeld: Laptop start niet"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Beschrijving
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                            placeholder="Beschrijf het probleem..."
                        ></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Medewerker
                        </label>

                        <select
                            name="medewerker_id"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                            <option value="">Kies een medewerker</option>

                            @foreach ($medewerkers as $medewerker)
                                <option value="{{ $medewerker->id }}">
                                    {{ $medewerker->naam }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Categorie
                        </label>

                        <select
                            name="category_id"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                            <option value="">Kies een categorie</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->naam }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Prioriteit
                        </label>

                        <select
                            name="priority"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                            <option value="laag">Laag</option>
                            <option value="normaal" selected>Normaal</option>
                            <option value="hoog">Hoog</option>
                        </select>
                    </div>

                    <button
                        type="submit"
                        class="px-4 py-2 bg-gray-800 text-white rounded"
                    >
                        Ticket aanmaken
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
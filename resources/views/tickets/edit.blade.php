<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ticket aanpassen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('tickets.update', $ticket) }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Titel
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ $ticket->title }}"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
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
                        >{{ $ticket->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Medewerker
                        </label>

                        <select
                            name="medewerker_id"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                            @foreach ($medewerkers as $medewerker)
                                <option
                                    value="{{ $medewerker->id }}"
                                    {{ $ticket->medewerker_id == $medewerker->id ? 'selected' : '' }}
                                >
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
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ $ticket->category_id == $category->id ? 'selected' : '' }}
                                >
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
                            <option value="laag" {{ $ticket->priority == 'laag' ? 'selected' : '' }}>
                                Laag
                            </option>

                            <option value="normaal" {{ $ticket->priority == 'normaal' ? 'selected' : '' }}>
                                Normaal
                            </option>

                            <option value="hoog" {{ $ticket->priority == 'hoog' ? 'selected' : '' }}>
                                Hoog
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Status
                        </label>

                        <select
                            name="status"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                        >
                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>
                                Open
                            </option>

                            <option value="in behandeling" {{ $ticket->status == 'in behandeling' ? 'selected' : '' }}>
                                In behandeling
                            </option>

                            <option value="opgelost" {{ $ticket->status == 'opgelost' ? 'selected' : '' }}>
                                Opgelost
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">
                            Oplossing
                        </label>

                        <textarea
                            name="solution"
                            rows="4"
                            class="border-gray-300 rounded-md shadow-sm mt-1 block w-full"
                            placeholder="Beschrijf de oplossing..."
                        >{{ $ticket->solution }}</textarea>
                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded"
                        >
                            Wijzigingen opslaan
                        </button>

                        <a
                            href="{{ route('tickets.show', $ticket) }}"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded"
                        >
                            Annuleren
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
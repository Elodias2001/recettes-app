<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer une nouvelle recette') }}
        </h2>
    </x-slot>

    {{-- @php
        $recipe = App\Models\Recipe::latest()->first();
        $recipe->ingredients->map(fn ($ingredient) => dump($ingredient->pivot->amount));
    @endphp --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">Créer votre nouvelle recette!</div>
            <form action="{{ route('recipes.store') }}" method="post">
                @csrf

                <x-input-label value="Titre de la recette" for="title"></x-input-label>
                <x-text-input name="title" id="title"></x-text-input>

                @foreach ($ingredients as $ingredient)
                <div class="my-5" x-data="{isEnabled: false}">
                    <x-input-label value="{{ $ingredient->name }}" for="{{ $ingredient->id }}"></x-input-label>
                    <x-text-input type="checkbox" id="{{ $ingredient->id }}" x-model="isEnabled"></x-text-input>

                    {{-- //Pour dire desactive les deux champs en bas quand cet ingredient n'est pas cocher --}}
                    <x-text-input name="ingredients[{{ $ingredient->id }}][amount]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-bind:disabled="!isEnabled"></x-text-input>
                    <x-text-input name="ingredients[{{ $ingredient->id }}][unit]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" x-bind:disabled="!isEnabled"></x-text-input>
                </div>
                @endforeach

                <x-primary-button type="submit">Créer ma recette</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

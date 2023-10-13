<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Création d\'une annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" enctype="multipart/form-data" action="{{route('ads.store')}}">
                        @csrf
                        <x-input-label for="title">Titre</x-input-label>
                        <x-text-input required type="text" name="title" id="title"/>
                        <x-input-label for="category">Catégorie</x-input-label>
                        <x-select-input name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->value }}">{{ $category->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="description">Description</x-input-label>
                        <x-textarea required name="description" id="description"/>
                        <x-input-label for="price">Prix (en €)</x-input-label>
                        <x-number-input required type="number" name="price" id="price" step="any" min="0" pattern="^\d*(\.\d{0,2})?$"/>
                        <x-input-label for="city">Ville</x-input-label>
                        <x-text-input required type="text" name="city" id="city"/>
                        <x-input-label for="state">État</x-input-label>
                        <x-select-input name="state" id="state">
                            @foreach ($states as $state)
                                <option value="{{ $state->value }}">{{ $state->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="year_prod">Année</x-input-label>
                        <x-number-input required type="number" name="year_prod" id="year_prod" min="0"
                                      max="{{ now()->year }}"/>
                        <x-input-label for="height">Hauteur (en cm)</x-input-label>
                        <x-number-input required type="number" name="height" id="height" step="any" min="0" pattern="^\d*(\.\d{0,2})?$"/>
                        <x-input-label for="width">Largeur (en cm)</x-input-label>
                        <x-number-input required type="number" name="width" id="width" step="any" min="0" pattern="^\d*(\.\d{0,2})?$"/>
                        <x-input-label for="depth">Profondeur (en cm)</x-input-label>
                        <x-number-input required type="number" name="depth" id="depth" step="any" min="0" pattern="^\d*(\.\d{0,2})?$"/>
                        <x-input-label for="weight">Poids (en kg)</x-input-label>
                        <x-number-input required type="number" name="weight" id="weight" step="any" min="0" pattern="^\d*(\.\d{0,2})?$"/>
                        <x-input-label for="expiration_date">Date de fin de l'annonce</x-input-label>
                        <x-date-input required type="date" name="expiration_date" id="expiration_date"/>
                        <x-input-label for="delivery">Type de livraison</x-input-label>
                        <x-select-input name="delivery" id="delivery">
                            @foreach ($deliveries as $delivery)
                                <option value="{{ $delivery->value }}">{{ $delivery->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="warranties">Garanties</x-input-label>
                        <x-textarea required name="warranties" id="warranties"/>
                        <x-input-label for="delivery">Échange ou négociation</x-input-label>
                        <x-select-input name="trade" id="trade">
                            @foreach ($trades as $trade)
                                <option value="{{ $trade->value }}">{{ $trade->value }}</option>
                            @endforeach
                        </x-select-input>
                        {{$errors}}
                        <div class="mt-4">
                            <x-button-input value="Envoyer"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

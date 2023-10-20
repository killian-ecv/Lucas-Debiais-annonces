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
                    <form class="flex flex-col gap-4" method="POST" enctype="multipart/form-data" action="{{route('ads.store')}}">
                        @csrf
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow-[2] w-0 basis-[200px]">
                                <x-input-label for="title">Titre</x-input-label>
                                <x-text-input class="w-full" required type="text" name="title" id="title"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="category">Catégorie</x-input-label>
                                <x-select-input class="w-full" name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->value }}">{{ $category->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div>
                            <x-input-label for="description">Description</x-input-label>
                            <x-textarea class="w-full" required name="description" id="description"/>
                        </div>
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="expiration_date">Date de fin de l'annonce</x-input-label>
                                <x-date-input class="w-full" required type="date" name="expiration_date" id="expiration_date"/>
                            </div>
                            <div class="grow-[2] w-0 basis-[200px]">
                                <x-input-label for="city">Ville</x-input-label>
                                <x-text-input class="w-full" required type="text" name="city" id="city"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="delivery">Type de livraison</x-input-label>
                                <x-select-input class="w-full" name="delivery" id="delivery">
                                    @foreach ($deliveries as $delivery)
                                        <option value="{{ $delivery->value }}">{{ $delivery->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="price">Prix (en €)</x-input-label>
                                <x-number-input class="w-full" required type="number" name="price" id="price" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="state">État</x-input-label>
                                <x-select-input class="w-full" name="state" id="state">
                                    @foreach ($states as $state)
                                        <option value="{{ $state->value }}">{{ $state->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="year_prod">Année</x-input-label>
                                <x-number-input class="w-full" type="number" name="year_prod" id="year_prod" min="0"
                                                max="{{ now()->year }}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="delivery">Échange ou négociation</x-input-label>
                                <x-select-input class="w-full" name="trade" id="trade">
                                    @foreach ($trades as $trade)
                                        <option value="{{ $trade->value }}">{{ $trade->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="height">Hauteur (en cm)</x-input-label>
                                <x-number-input class="w-full" type="number" name="height" id="height" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="width">Largeur (en cm)</x-input-label>
                                <x-number-input class="w-full" type="number" name="width" id="width" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="depth">Profondeur (en cm)</x-input-label>
                                <x-number-input class="w-full" type="number" name="depth" id="depth" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="weight">Poids (en kg)</x-input-label>
                                <x-number-input class="w-full" type="number" name="weight" id="weight" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$"/>
                            </div>
                        </div>
                        <div>
                            <x-input-label for="warranties">Garanties</x-input-label>
                            <x-textarea class="w-full" name="warranties" id="warranties"/>
                        </div>
                        <div>
                            <x-input-label for="images">Images :</x-input-label>
                            <x-file-input type="file" name="images[]" id="images" multiple accept="image/*"/>
                        </div>
                        <div class="mt-4">
                            <x-button-input value="Envoyer"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

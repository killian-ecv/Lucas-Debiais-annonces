<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification d\'une annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" enctype="multipart/form-data" action="{{route('ads.update', $ad->id)}}">
                        @csrf
                        @method('PUT')
                        <x-input-label for="title">Titre</x-input-label>
                        <x-text-input required type="text" name="title" id="title" value="{{$ad->title ?? ''}}"/>
                        <x-input-label for="category">Catégorie</x-input-label>
                        <x-select-input name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->value }}">{{ $category->value ?? ''}}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="description">Description</x-input-label>
                        <x-textarea required name="description" id="description" value="{{$ad->description ?? ''}}"/>
                        <x-input-label for="price">Prix (en €)</x-input-label>
                        <x-number-input required type="number" name="price" id="price" step="any" min="0" pattern="^\d*(\.\d{0,2})?$" value="{{$ad->price ?? ''}}"/>
                        <x-input-label for="city">Ville</x-input-label>
                        <x-text-input required type="text" name="city" id="city" value="{{$ad->city ?? ''}}"/>
                        <x-input-label for="state">État</x-input-label>
                        <x-select-input name="state" id="state">
                            @foreach ($states as $state)
                                <option {{$state->value === $ad->state ? 'selected' : ''}} value="{{ $state->value }}">{{ $state->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="year_prod">Année</x-input-label>
                        <x-number-input type="number" name="year_prod" id="year_prod" min="0"
                                      max="{{ now()->year }}" value="{{$ad->year_prod ?? ''}}"/>
                        <x-input-label for="height">Hauteur (en cm)</x-input-label>
                        <x-number-input type="number" name="height" id="height" step="any" min="0" pattern="^\d*(\.\d{0,2})?$" value="{{$ad->height ?? ''}}"/>
                        <x-input-label for="width">Largeur (en cm)</x-input-label>
                        <x-number-input type="number" name="width" id="width" step="any" min="0" pattern="^\d*(\.\d{0,2})?$" value="{{$ad->width ?? ''}}"/>
                        <x-input-label for="depth">Profondeur (en cm)</x-input-label>
                        <x-number-input type="number" name="depth" id="depth" step="any" min="0" pattern="^\d*(\.\d{0,2})?$" value="{{$ad->depth ?? ''}}"/>
                        <x-input-label for="weight">Poids (en kg)</x-input-label>
                        <x-number-input type="number" name="weight" id="weight" step="any" min="0" pattern="^\d*(\.\d{0,2})?$" value="{{$ad->weight ?? ''}}"/>
                        <x-input-label for="expiration_date">Date de fin de l'annonce</x-input-label>
                        <x-date-input required type="date" name="expiration_date" id="expiration_date" value="{{$ad->expiration_date ?? ''}}"/>
                        <x-input-label for="delivery">Type de livraison</x-input-label>
                        <x-select-input name="delivery" id="delivery">
                            @foreach ($deliveries as $delivery)
                                <option {{$delivery->value === $ad->delivery ? 'selected' : ''}} value="{{ $delivery->value }}">{{ $delivery->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="warranties">Garanties</x-input-label>
                        <x-textarea name="warranties" id="warranties" value="{{$ad->warranties ?? ''}}"/>
                        <x-input-label for="delivery">Échange ou négociation</x-input-label>
                        <x-select-input name="trade" id="trade">
                            @foreach ($trades as $trade)
                                <option {{$trade->value === $ad->trade ? 'selected' : ''}} value="{{ $trade->value }}">{{ $trade->value }}</option>
                            @endforeach
                        </x-select-input>

                        @foreach($ad->images as $image)
                            <div>
                                <input type="hidden" name="existing_images[{{ $image->id }}][id]" value="{{ $image->id }}">

                               <img src="{{asset('storage/' . $image->img_url)}}" alt="">

                                <!-- Champ de téléchargement d'image pour la modification de l'image existante -->
                                <label for="existing_images[{{ $image->id }}][new_img]">Modifier l'image:</label>
                                <input type="file" name="existing_images[{{ $image->id }}][new_img]" accept="image/*">

                                <!-- Case à cocher pour la suppression de l'image existante -->
                                <label for="existing_images[{{ $image->id }}][delete]">Supprimer l'image:</label>
                                <input type="checkbox" name="existing_images[{{ $image->id }}][delete]">
                            </div>
                        @endforeach

                        <!-- Champs d'Image (multiple) pour l'ajout de nouvelles images -->
                        <label for="images">Ajouter de nouvelles images:</label>
                        <input type="file" name="images[]" accept="image/*" multiple>
                        <div class="mt-4">
                            <x-button-input value="Envoyer"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

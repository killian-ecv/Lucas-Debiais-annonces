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
                        <x-number-input required type="number" name="price" id="price" step="any" min="0"
                                        pattern="^\d*(\.\d{0,2})?$" value="{{$ad->price ?? ''}}"/>
                        <x-input-label for="city">Ville</x-input-label>
                        <x-text-input required type="text" name="city" id="city" value="{{$ad->city ?? ''}}"/>
                        <x-input-label for="state">État</x-input-label>
                        <x-select-input name="state" id="state">
                            @foreach ($states as $state)
                                <option
                                    {{$state->value === $ad->state ? 'selected' : ''}} value="{{ $state->value }}">{{ $state->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="year_prod">Année</x-input-label>
                        <x-number-input type="number" name="year_prod" id="year_prod" min="0"
                                        max="{{ now()->year }}" value="{{$ad->year_prod ?? ''}}"/>
                        <x-input-label for="height">Hauteur (en cm)</x-input-label>
                        <x-number-input type="number" name="height" id="height" step="any" min="0"
                                        pattern="^\d*(\.\d{0,2})?$" value="{{$ad->height ?? ''}}"/>
                        <x-input-label for="width">Largeur (en cm)</x-input-label>
                        <x-number-input type="number" name="width" id="width" step="any" min="0"
                                        pattern="^\d*(\.\d{0,2})?$" value="{{$ad->width ?? ''}}"/>
                        <x-input-label for="depth">Profondeur (en cm)</x-input-label>
                        <x-number-input type="number" name="depth" id="depth" step="any" min="0"
                                        pattern="^\d*(\.\d{0,2})?$" value="{{$ad->depth ?? ''}}"/>
                        <x-input-label for="weight">Poids (en kg)</x-input-label>
                        <x-number-input type="number" name="weight" id="weight" step="any" min="0"
                                        pattern="^\d*(\.\d{0,2})?$" value="{{$ad->weight ?? ''}}"/>
                        <x-input-label for="expiration_date">Date de fin de l'annonce</x-input-label>
                        <x-date-input required type="date" name="expiration_date" id="expiration_date"
                                      value="{{$ad->expiration_date ?? ''}}"/>
                        <x-input-label for="delivery">Type de livraison</x-input-label>
                        <x-select-input name="delivery" id="delivery">
                            @foreach ($deliveries as $delivery)
                                <option
                                    {{$delivery->value === $ad->delivery ? 'selected' : ''}} value="{{ $delivery->value }}">{{ $delivery->value }}</option>
                            @endforeach
                        </x-select-input>
                        <x-input-label for="warranties">Garanties</x-input-label>
                        <x-textarea name="warranties" id="warranties" value="{{$ad->warranties ?? ''}}"/>
                        <x-input-label for="delivery">Échange ou négociation</x-input-label>
                        <x-select-input name="trade" id="trade">
                            @foreach ($trades as $trade)
                                <option
                                    {{$trade->value === $ad->trade ? 'selected' : ''}} value="{{ $trade->value }}">{{ $trade->value }}</option>
                            @endforeach
                        </x-select-input>

                        <div class="flex flex-wrap gap-8">
                            @foreach($ad->images as $image)
                                <div class="file-modification relative flex-grow basis-[350px] bg-gray-100 rounded-md">
                                    <input type="hidden" name="existing_images[{{ $image->id }}][id]"
                                           value="{{ $image->id }}">

                                    <img class="w-full h-full object-contain" src="{{asset('storage/' . $image->img_url)}}" alt="">

                                    <input class="modification-input hidden" type="file" id="existing_images[{{ $image->id }}][new_img]" name="existing_images[{{ $image->id }}][new_img]"
                                           accept="image/*">
                                    <label class="absolute top-0 start-0 translate-x-[-25%] translate-y-[-25%] p-2 rounded-full bg-blue-500 text-white cursor-pointer" for="existing_images[{{ $image->id }}][new_img]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                        </svg>
                                    </label>

                                    <input class="hidden peer" type="checkbox"
                                           id="existing_images[{{ $image->id }}][delete]"
                                           name="existing_images[{{ $image->id }}][delete]">
                                    <label class="absolute top-0 end-0 translate-x-1/4 translate-y-[-25%] p-2 rounded-full bg-red-500 text-white cursor-pointer peer-checked:bg-black" for="existing_images[{{ $image->id }}][delete]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                </div>
                            @endforeach
                        </div>

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

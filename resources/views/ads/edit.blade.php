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
                    <form class="flex flex-col gap-4" method="POST" enctype="multipart/form-data"
                          action="{{route('ads.update', $ad->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow-[2] w-0 basis-[200px]">
                                <x-input-label for="title">Titre</x-input-label>
                                <x-text-input class="w-full" required type="text" name="title" id="title"
                                              value="{{$ad->title ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="category">Catégorie</x-input-label>
                                <x-select-input class="w-full" name="category" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->value }}">{{ $category->value ?? ''}}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div>
                            <x-input-label for="description">Description</x-input-label>
                            <x-textarea class="w-full" required name="description" id="description"
                                        value="{{$ad->description ?? ''}}"/>
                        </div>
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="expiration_date">Date de fin de l'annonce</x-input-label>
                                <x-date-input class="w-full" required type="date" name="expiration_date"
                                              id="expiration_date"
                                              value="{{$ad->expiration_date ?? ''}}"/>
                            </div>
                            <div class="grow-[2] w-0 basis-[200px]">
                                <x-input-label for="city">Ville</x-input-label>
                                <x-text-input class="w-full" required type="text" name="city" id="city"
                                              value="{{$ad->city ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="delivery">Type de livraison</x-input-label>
                                <x-select-input class="w-full" name="delivery" id="delivery">
                                    @foreach ($deliveries as $delivery)
                                        <option
                                            {{$delivery->value === $ad->delivery ? 'selected' : ''}} value="{{ $delivery->value }}">{{ $delivery->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="price">Prix (en €)</x-input-label>
                                <x-number-input class="w-full" required type="number" name="price" id="price" step="any"
                                                min="0"
                                                pattern="^\d*(\.\d{0,2})?$" value="{{$ad->price ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="state">État</x-input-label>
                                <x-select-input class="w-full" name="state" id="state">
                                    @foreach ($states as $state)
                                        <option
                                            {{$state->value === $ad->state ? 'selected' : ''}} value="{{ $state->value }}">{{ $state->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="year_prod">Année</x-input-label>
                                <x-number-input class="w-full" type="number" name="year_prod" id="year_prod" min="0"
                                                max="{{ now()->year }}" value="{{$ad->year_prod ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="delivery">Échange ou négociation</x-input-label>
                                <x-select-input class="w-full" name="trade" id="trade">
                                    @foreach ($trades as $trade)
                                        <option
                                            {{$trade->value === $ad->trade ? 'selected' : ''}} value="{{ $trade->value }}">{{ $trade->value }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 flex-wrap">
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="height">Hauteur (en cm)</x-input-label>
                                <x-number-input class="w-full" type="number" name="height" id="height" step="any"
                                                min="0"
                                                pattern="^\d*(\.\d{0,2})?$" value="{{$ad->height ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="width">Largeur (en cm)</x-input-label>
                                <x-number-input class="w-full" type="number" name="width" id="width" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$" value="{{$ad->width ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="depth">Profondeur (en cm)</x-input-label>
                                <x-number-input class="w-full" type="number" name="depth" id="depth" step="any" min="0"
                                                pattern="^\d*(\.\d{0,2})?$" value="{{$ad->depth ?? ''}}"/>
                            </div>
                            <div class="grow w-0 basis-[200px]">
                                <x-input-label for="weight">Poids (en kg)</x-input-label>
                                <x-number-input class="w-full" type="number" name="weight" id="weight" step="any"
                                                min="0"
                                                pattern="^\d*(\.\d{0,2})?$" value="{{$ad->weight ?? ''}}"/>
                            </div>
                        </div>
                        <div>
                            <x-input-label for="warranties">Garanties</x-input-label>
                            <x-textarea class="w-full" name="warranties" id="warranties"
                                        value="{{$ad->warranties ?? ''}}"/>
                        </div>
                        <div class="flex flex-wrap gap-8">
                            @foreach($ad->images as $image)
                                <div class="file-modification relative flex-grow basis-[350px] bg-gray-100 rounded-md max-h-[150px]">
                                    <input type="hidden" name="existing_images[{{ $image->id }}][id]"
                                           value="{{ $image->id }}">

                                    <img class="w-full h-full object-contain"
                                         src="{{asset('storage/' . $image->img_url)}}" alt="">

                                    <input class="modification-input hidden" type="file"
                                           id="existing_images[{{ $image->id }}][new_img]"
                                           name="existing_images[{{ $image->id }}][new_img]"
                                           accept="image/*">
                                    <label
                                        class="absolute top-0 start-0 translate-x-[-25%] translate-y-[-25%] p-2 rounded-full bg-blue-500 text-white cursor-pointer"
                                        for="existing_images[{{ $image->id }}][new_img]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-4 h-4">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"/>
                                        </svg>
                                    </label>

                                    <input class="hidden peer" type="checkbox"
                                           id="existing_images[{{ $image->id }}][delete]"
                                           name="existing_images[{{ $image->id }}][delete]">
                                    <label
                                        class="absolute top-0 end-0 translate-x-1/4 translate-y-[-25%] p-2 rounded-full bg-red-500 text-white cursor-pointer peer-checked:bg-black"
                                        for="existing_images[{{ $image->id }}][delete]">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                  d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            <label for="images">Ajouter de nouvelles images:</label>
                            <x-file-input type="file" name="images[]" accept="image/*" multiple/>
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

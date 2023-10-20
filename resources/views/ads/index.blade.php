<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste de mes annonces') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-4 py-4">
        @foreach($ads as $ad)
            @if($ad->expiration_date > now())
                <div
                    class="border border-gray-200 bg-white flex md:flex-row flex-col md:items-center gap-4 rounded-md relative">
                    @if(!($ad->images)->isEmpty())
                        <div class="swiper swiper-imgs-ad rounded-md bg-white md:w-1/4 w-full !mx-0">
                            <div class="swiper-wrapper items-center">
                                @foreach($ad->images as $image)
                                    <div class="swiper-slide">
                                        <img class="w-full object-contain md:max-h-[150px] max-h-[250px]"
                                             src="{{asset('storage/' . $image->img_url)}}"
                                             alt=""/>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    @endif
                    <div class="p-4">
                        <h1 class="text-2xl font-black mb-2">{{$ad->title}}</h1>
                        <span
                            class="px-2 py-0.5 border border-black rounded-md block w-fit text-xs mb-2">{{$ad->category}}</span>
                        <ul class="flex items-center gap-2 text-gray-400 text-sm">
                            <li class="flex items-center gap-2 after:content-['●']">{{$ad->city}}</li>
                            @if($ad->year_prod)
                                <li class="flex items-center gap-2 after:content-['●']">{{$ad->year_prod}}</li>
                            @endif
                            <li>{{$ad->state}}</li>
                        </ul>
                        <span class="text-xl font-bold block">{{$ad->price}}€</span>
                        <div class="absolute bottom-4 end-4 flex gap-4 items-center">
                            <a href="{{route('ads.show', $ad->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-4 h-4">
                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                                    <path fill-rule="evenodd"
                                          d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                            <a href="{{route('ads.edit', $ad->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-4 h-4">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"/>
                                </svg>
                            </a>
                            <form class="h-4" action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                         class="w-4 h-4">
                                        <path fill-rule="evenodd"
                                              d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</x-app-layout>

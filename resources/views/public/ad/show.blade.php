<x-app-layout>
    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <div class="flex md:items-center md:flex-row flex-col gap-4 justify-between">
                <div class="flex md:items-center md:flex-row flex-col gap-4">
                    <h1 class="md:text-9xl text-6xl font-black">{{$ad->title}}</h1>
                    <span
                        class="px-4 py-2 border border-black rounded-full block w-fit text-xs self-start">{{$ad->category}}</span>
                </div>
                <span class="md:text-5xl text-2xl font-bold block">{{$ad->price}}€</span>
            </div>
            <div class="mt-4">
                <ul class="info-list">
                    <li>{{$ad->updated_at->format('j M Y - H:i:s')}}</li>
                    <li>{{$ad->state}}</li>
                    <li>{{$ad->delivery}}</li>
                    <li>{{$ad->trade}}</li>
                </ul>
            </div>
        </div>
        <div class="flex md:flex-row flex-col gap-20">
            <div class="swiper swiper-imgs-ad rounded-md bg-white max-w-[500px] !mx-0 self-center w-full">
                <div class="swiper-wrapper items-center">
                    @foreach($ad->images as $image)
                        <div class="swiper-slide">
                            <img class="w-full max-h-[500px] object-contain"
                                 src="{{asset('storage/' . $image->img_url)}}"
                                 alt=""/>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="grow flex flex-col gap-12">
                <div class="flex md:flex-row flex-col gap-12">
                    <div class="grow md:w-0">
                        <h2 class="text-4xl font-medium mb-5">Description</h2>
                        <p>{{$ad->description}}</p>
                    </div>
                    @if($ad->warranties)
                        <div class="grow md:w-0">
                            <h2 class="text-4xl font-medium mb-5">Garanties</h2>
                            <p>{{$ad->warranties}}</p>
                        </div>
                    @endif
                </div>
                <div class="flex md:flex-row flex-col gap-12">
                    <div class="grow md:w-0">
                        @if($ad->height || $ad->width || $ad->depth || $ad->weight)
                            <div>
                                <h2 class="text-4xl font-medium mb-5">Caractéristiques</h2>
                                <ul class="caracteristique-list">
                                    @if($ad->height)
                                        <li>Hauteur : <span>{{$ad->height}}cm</span></li>
                                    @endif
                                    @if($ad->width)
                                        <li>Largeur : <span>{{$ad->width}}cm</span></li>
                                    @endif
                                    @if($ad->depth)
                                        <li>Profondeur : <span>{{$ad->depth}}cm</span></li>
                                    @endif
                                    @if($ad->weight)
                                        <li>Poids : <span>{{$ad->weight}}kg</span></li>
                                    @endif
                                    @if($ad->year_prod)
                                        <li>Année : <span>{{$ad->year_prod}}</span></li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="grow md:w-0">
                        <h2 class="text-4xl font-medium mb-5">Lien de vente</h2>
                        <p class="mb-2">{{$ad->city}}</p>
                        <div class="rounded text-white w-full bg-black grid place-items-center">map</div>
                    </div>
                </div>
                @if(Auth::user())
                    <a class="w-full bg-black py-2 px-4 text-white rounded-full text-center"
                       href="mailto:{{$ad->user->email}}">Contacter le vendeur</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

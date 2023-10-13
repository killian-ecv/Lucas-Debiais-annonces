<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap gap-4 pt-4">
        @foreach($ads as $ad)
            <div class="basis-[250px] flex-grow bg-white rounded-md p-4">
                <h1 class="text-2xl font-black mb-2">{{$ad->title}}</h1>
                <span class="px-2 py-0.5 border border-black rounded-md block w-fit text-xs mb-2">{{$ad->category}}</span>
                <ul class="flex items-center gap-2 text-gray-400 text-sm">
                    <li class="flex items-center gap-2 after:content-['●']">{{$ad->city}}</li>
                    @if($ad->year_prod)
                        <li class="flex items-center gap-2 after:content-['●']">{{$ad->year_prod}}</li>
                    @endif
                    <li>{{$ad->state}}</li>
                </ul>
                <span class="text-xl font-bold block mb-2">{{$ad->price}}€</span>
                <x-a href="{{route('public.ads.show', $ad->id)}}">Voir</x-a>
            </div>
        @endforeach
    </div>
</x-app-layout>

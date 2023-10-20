<x-app-layout>
    <h1 class="text-2xl font-black">{{$ad->title}}</h1>
    <span class="px-2 py-0.5 border border-black rounded-md block w-fit text-xs">{{$ad->category}}</span>
    <ul class="flex items-center gap-2 text-gray-400 text-sm">
        <li class="flex items-center gap-2 after:content-['●']">{{$ad->city}}</li>
        @if($ad->year_prod)
            <li class="flex items-center gap-2 after:content-['●']">{{$ad->year_prod}}</li>
        @endif
        <li>{{$ad->state}}</li>
    </ul>
    <span class="text-xl font-bold block">{{$ad->price}}€</span>
    <span class="text-xs text-gray-400 block">{{$ad->updated_at->format('j M Y - H:i:s')}}</span>
    <ul>
        @if($ad->height)
            <li>H. {{$ad->height}}cm</li>
        @endif
        @if($ad->width)
            <li>L. {{$ad->width}}cm</li>
        @endif
        @if($ad->depth)
            <li>l. {{$ad->depth}}cm</li>
        @endif
        @if($ad->weight)
            <li>{{$ad->weight}}kg</li>
        @endif
        <li>{{$ad->trade}}</li>
        <li>{{$ad->delivery}}</li>
    </ul>
    <p>{{$ad->description}}</p>
    @if($ad->warranties)
        <p>{{$ad->warranties}}</p>
    @endif
    @if(Auth::user())
        <span class="block">{{$ad->user->email}}</span>
    @endif

    @foreach($ad->images as $image)
        <img src="{{asset('storage/' . $image->img_url)}}" alt=""/>
    @endforeach
</x-app-layout>

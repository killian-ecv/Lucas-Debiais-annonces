<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center gap-4 flex-wrap mt-16">
        <x-a :href="route('ads.index')" :active="request()->routeIs('ads.index')">
            {{ __('Mes annonces') }}
        </x-a>
        <x-a :href="route('ads.create')" :active="request()->routeIs('ads.create')">
            {{ __('Créer une annonce') }}
        </x-a>
    </div>
</x-app-layout>

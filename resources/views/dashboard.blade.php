<x-app-layout>
    @if(Auth()->user())
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard - Bem-vindo(a)') }} {{ Auth()->user()->name}}!
        </h2>
    </x-slot>
    @else

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bem-vindo(a) ao Energy Chanel') }}!
        </h2>
    </x-slot>
    @endif

    @if(Auth()->user())

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1> </h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:add-post-feed />
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="py-4 mb-4">
        <livewire:fetch-posts />
    </div>
</x-app-layout>
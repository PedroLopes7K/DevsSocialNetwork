<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Seus Posts') }} {{Auth()->user()->name}}
      </h2>

      <x-nav-link :href="route('liked.posts')" :active="request()->routeIs('liked.posts')">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Posts Curtidos') }}
        </h2>

      </x-nav-link>
    </div>
  </x-slot>


  <livewire:my-posts />



  <div class="py-4 mb-4">
  </div>
</x-app-layout>
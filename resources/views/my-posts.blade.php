<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Seus Posts') }} {{Auth()->user()->name}}
    </h2>
  </x-slot>


  <livewire:my-posts />



  <div class="py-4 mb-4">
  </div>
</x-app-layout>
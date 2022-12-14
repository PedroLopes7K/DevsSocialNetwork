<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Pedidos de Amizade') }}
    </h2>
  </x-slot>



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <livewire:button-previous-page :currentRoute="route('sends-friendship')" />

          @if(count($friendships) > 0)
          @foreach($friendships as $friendship)
          <div class="my-8">
            <p>{{ $friendship->user->name}} te enviou uma solicitação de amizade. <a href="{{ route('confirm-friendship', $friendship->user_id)}}" class="p-2 bg-green-400 text-white rounded">Aceitar</a></p>
          </div>
          @endforeach
          @else
          <h1 class="font-2xl mt-8">Sem pedidos de amizade</h1>

          @endif

        </div>
      </div>
    </div>
  </div>

  <div class="py-4 mb-4">

  </div>
</x-app-layout>
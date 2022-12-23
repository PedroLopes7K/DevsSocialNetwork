<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Sobre Nós') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <div class="p-6 bg-white border-b border-gray-200 text-center">
          <h1 class="text-2xl"><b>ForDevs</b></h1>
          <p>Uma plataforma desenvolvida com o propósito de contribuir para a comunidade dev.</p>
          <p>Um local onde as pessoas poderam compartilhar seus conhecimentos com outros usuários, e também ajudar uns aos outros.</p>

          <div class="flex my-4 justify-between w-4/6 mx-auto">
            <div>

              <p><b>Desenvolvedor:</b> Pedro Henrique Lopes</p>
            </div>
            <div>

              <p> <b>Design:</b> Carol</p>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



  <div class="py-4 mb-4">
  </div>
</x-app-layout>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Todas as Sessões') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <div class="p-6 bg-white ">
          <div class="grid grid-cols-3 md:grid-cols-4 gap-4">
            <a href="{{route('other-users.index')}}" class="p-2">

              <div class="flex flex-col text-center align-middle  justify-center bg-yellow-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
                <h3 class="font-bold text-2xl ">Outros Usuários</h3>
                <p class="text-gray-700">Encontre outras pessoas para se conectar.</p>
              </div>
            </a>

            <a href="{{route('myfriends.index')}}" class="p-2">
              <div class="flex flex-col text-center align-middle  justify-center bg-yellow-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"></path>
                </svg>
                <h3 class="font-bold text-2xl ">Meus Amigos</h3>
                <p class="text-gray-700">Gerencie sua rede de amigos.</p>
              </div>
            </a>


            <a href="{{route('section.index')}}" class="p-2">
              <div class="flex flex-col text-center align-middle  justify-center bg-yellow-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <h3 class="font-bold text-2xl ">Tópicos de Discussão</h3>
                <p class="text-gray-700">Encontre informação sobre um tópico específico.</p>
              </div>
            </a>

            <a href="{{route('chats.index')}}" class="p-2">
              <div class="flex flex-col text-center align-middle  justify-center bg-yellow-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                </svg>
                <h3 class="font-bold text-2xl ">Meus Chats</h3>
                <p class="text-gray-700">Converse com seus amigos.</p>
              </div>
            </a>
            <a href="{{route('sends-friendship')}}" class="p-2">
              <div class="flex flex-col text-center align-middle  justify-center bg-yellow-200 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                <h3 class="font-bold text-2xl ">Pedidos de amizade</h3>
                <p class="text-gray-700">Gerencie seus pedidos de amizade.</p>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-4 mb-4">

  </div>
</x-app-layout>
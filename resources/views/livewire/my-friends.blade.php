<div class="mt-8">


    <div>
        <h1 class="text-gray-700 text-2xl">Amigos:</h1>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-2" for="search">
            Pesquise pelo nome:
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-white rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="search" type="text" placeholder="pesquisar...." wire:keydown="updateSearch($event.target.value)">
        @if(count($users) > 0)
        @foreach($users as $user)
        <div class="flex justify-between bg-gray-100 mt-4 p-4 shadow-lg">
            <a href="{{ route('user.posts', $user->id) }}" class="text-lg font-bold">{{ $user->username }}</a>
            <a href="{{ route('messages', $user->id) }}" class="bg-purple-500 text-white rounded p-2">Iniciar Chat</a>
            <!-- <a href="{{ route('make-friendship', $user->id) }}" class="bg-green-300 text-white p-2">Adicionar Amigo</a> -->
        </div>
        @endforeach
        @else
        <h2>Nenhum usuario encontado....</h2>
        @endif
    </div>





</div>
<div class="mt-8">
    <div class="mt-10">
        <h1 class="text-gray-700 text-2xl">Outros Usuários:</h1>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="search">
            Pesquise pelo nome:
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-white rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="search" type="text" placeholder="pesquisar...." wire:change="$emitUp('inputUpdate',$event.target.value)">
        @foreach($outherUsers as $user)
        <div class="flex justify-between bg-gray-100 mt-4 p-4 shadow-lg ">
            <a href="{{ route('user.posts', $user->id) }}" class="text-lg font-bold">{{ $user->username }}</a>
            <a href="{{ route('make-friendship', $user->id) }}" class="bg-green-500 rounded text-white p-2">Adicionar Amigo</a>
        </div>
        @endforeach
    </div>
</div>
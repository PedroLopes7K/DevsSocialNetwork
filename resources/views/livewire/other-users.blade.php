<div>

    @if (session()->has('success'))
    <span class="text-green-500">
        {{ session()->get('success') }}
    </span>
    @endif

    @if (session()->has('danger'))
    <span class="text-red-500">
        {{ session()->get('danger') }}
    </span>
    @endif
    @foreach($allUsers as $user)
    <div class="flex justify-between bg-gray-100 mt-4 p-4 shadow-lg">
        <a href="{{ route('user.posts', $user->id) }}" class="text-lg font-bold">{{ $user->username }}</a>
        <a href="{{ route('make-friendship', $user->id) }}" class="bg-green-300 text-white p-2">Adicionar Amigo</a>
    </div>
    @endforeach

</div>
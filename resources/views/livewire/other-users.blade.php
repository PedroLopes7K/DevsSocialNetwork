<div>
    @foreach($allUsers as $user)
    <div class="flex justify-between bg-gray-100 mt-4 p-4 shadow-lg">
        <a href="{{ route('user.posts', $user->id) }}" class="text-lg font-bold">{{ $user->username }}</a>
        <a href="" class="bg-green-300 text-white p-2">Adicionar Amigo</a>
    </div>
    @endforeach

</div>
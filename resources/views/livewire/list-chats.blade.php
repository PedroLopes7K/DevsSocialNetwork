<div class="border-b border-gray-200 flex" x-data="{ chat: 0 }">
    <div class="border-2 border-color-black h-60 w-2/6">
        @if(isset($chats))
        @foreach($chats as $chat)
        <div x-on:click="chat = {{$chat->id}}" class="p-2 bg-gray-200 mb-2 cursor-pointer">
            <b>Chat: {{$chat->userOne->name}} e {{$chat->userTwo->name}} </b>
        </div>
        @endforeach
        @endif

    </div>

    <div class="border-2 border-color-black p-4  h-full w-4/6">
        <div x-show="chat == 0" class="text-center m-10">
            <h1 class="text-2xl font-bold">Selecione um chat para conversar</h1>
        </div>
        @if(isset($chats))
        @foreach($chats as $chat)

        <div x-show="chat == {{$chat->id}}">
            <livewire:all-message :chatID="$chat->id" />
            <livewire:send-message :chatID="$chat->id" />

        </div>


        @endforeach
        @endif
    </div>
</div>
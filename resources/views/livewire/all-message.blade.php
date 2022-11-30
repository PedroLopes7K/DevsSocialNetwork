<div wire:poll.4000ms>
    <div class="">
        @foreach ($messages as $message)
        <div class="pt-6  @if ($message->user_id == Auth::id())  ml-96  @endif ">
            <p class="text-sm ">{{ucfirst($message->user->name)}} - {{ $message->created_at->format('d/m/Y') }} as {{ $message->created_at->format('H:i:s') }}</p>

            <div class="rounded-md p-2 w-[200px] text-white @if ($message->user_id == Auth::id()) bg-purple-500 @else bg-purple-300 @endif ">
                {{ $message->message }}

            </div>



        </div>
        @endforeach
    </div>
</div>
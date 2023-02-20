<div>
    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
        <span clas="text-green-500">
            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </span>
        <span class="tracking-wide">Posts</span>
    </div>
    <ul class="list-inside space-y-2">
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <li>
            <div class="text-teal-600"><a href="{{ route('single.post', $post->id) }}">{{$post->title}}</a></div>
            <div class="text-gray-500 text-xs">{{ $post->created_at->diffForHumans() }}</div>
        </li>
        @endforeach
        @endif

    </ul>
</div>
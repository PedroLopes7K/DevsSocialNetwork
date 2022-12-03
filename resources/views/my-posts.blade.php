<x-app-layout>

  @push('styles')
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  @endpush
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Seus Posts') }} {{Auth()->user()->name}}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        <div class="p-6 bg-white border-b border-gray-200">

          <livewire:button-previous-page :currentRoute="route('my.posts') " />

          @if (count($posts) > 0)
          <h1>
            <div wire:poll>
              @foreach ($posts as $post)
              @php
              $images = App\Models\Image::where('post_id', $post->id)->get();
              @endphp
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 bg-white border-b border-gray-200">
                    <!-- <div class="grid gap-5"> -->
                    <div class="">
                      <div class="text-lg my-4">
                        {{ $post->body }}
                      </div>
                      <!-- place-items-center -->
                      <!-- <div class="grid grid-cols-2 ">
                        @if(count($images) > 0)
                        @foreach($images as $image)
                        <img src="{{ asset('storage/' . $image->image) }}" alt="" class="w-[300px] h-[290px]">
                        @endforeach

                        @endif -->
                      <div class="swiper mySwiper ">
                        <div class="swiper-wrapper">
                          @foreach($images as $image)
                          <div class="swiper-slide">
                            <img class="object-cover w-[300px] h-[290px] mx-auto mb-4" src="{{ asset('storage/' . $image->image) }}" alt="image" />
                          </div>
                          @endforeach

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                      </div>


                      <div class="flex justify-between">
                        <a href="{{ route('messages', $post->user->id) }}" class="text-lg font-bold">{{ $post->user->username }}</a>
                        <span class="text-lg font-thin">{{ $post->created_at->diffForHumans() }}</span>
                      </div>

                      <div class="flex space-x-6">
                        <svg wire:click="addLikeToPost({{ $post->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer  @if ($post->userLikedPost()) text-blue-500 @endif">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg> {{ $post->likes->count() }}

                        <a href="{{ route('single.post', $post->id) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                          </svg>
                        </a>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>




          </h1>
          @else
          <h2 class="text-2xl">Nenhum Post</h2>

          @endif
        </div>

      </div>

    </div>
  </div>

  @push('scripts')
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      cssMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      mousewheel: true,
      keyboard: true,
    });
  </script>
  @endpush
</x-app-layout>
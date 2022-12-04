<x-app-layout>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post de {{ $post->user->username}}
        </h2>
    </x-slot>
    @php
    $images = App\Models\Image::where('post_id', $post->id)->get();
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- COMEÇO -->
                    <div class="grid gap-5">
                        <!-- <div class=""> -->
                        <div class="text-lg my-4">
                            {{ $post->body }}
                        </div>
                        <div class="grid place-items-center">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-[300px]">
                        </div>

                        <!-- <div class="swiper mySwiper ">
                            <div class="swiper-wrapper">
                                @foreach($images as $image)
                                <div class="swiper-slide">
                                    <img class="object-cover w-[350px] h-[340px] mx-auto mb-4" src="{{ asset('storage/' . $image->image) }}" alt="image" />
                                </div>
                                @endforeach

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div> -->
                        <div class="flex justify-between">
                            <span class="text-lg font-bold">{{ $post->user->username }}</span>
                            <span class="text-lg font-thin">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- FIM  -->
                    <div class="pt-6">
                        <livewire:fetch-comments :postId="$post->id" />

                    </div>

                    <div class="pt-6">
                        <hr>
                        <livewire:add-comment :postId="$post->id" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 mb-4">





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
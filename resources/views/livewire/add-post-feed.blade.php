<div>
    <form wire:submit.prevent="store" class="">
        <div class="grid mb-2">
            <label for="text-post" class="my-2 text-gray-700"><b>Que tal postar algum conteúdo?</b></label>
            <!-- <textarea wire:model="body" id="text-post" class="border border-gray-300 focus:outline-purple-500 rounded-md" cols="10" rows="7"></textarea> -->

            <x-quill wire:model="body" />

            @error('body')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror

            <div class="mt-2">
                <div class="mb-3 w-96">
                    <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> <i class="fa-solid fa-image mx-2 text-xl "></i><b>Adicionar Imagem:</b></label>
                    <input wire:model="coverImage" class="form-control
                    
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
                </div>
            </div>
        </div>
        <div>
            <button type="submit" wire:submit.prevent="store" class="bg-purple-500 text-white px-6 py-2 rounded-md">Postar</button>
        </div>
    </form>


</div>
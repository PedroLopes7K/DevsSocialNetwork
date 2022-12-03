<div>


    <form wire:submit.prevent="store" class="">

        <!-- <div class="grid">
            <label for="">Imagem:</label>
            <input type="file" wire:model="coverImage" class="file:rounded-md file:bg-purple-500 file:text-white rounded-md border file:border-none p-4" id="">
            @error('coverImage')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div> -->
        <div class="grid mb-2">
            <label for="body" class="my-2"><b>Que tal postar algum conteúdo?</b></label>
            <textarea wire:model="body" id="body" class="border border-gray-300 focus:outline-purple-500 rounded-md" cols="10" rows="10"></textarea>
            @error('body')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror

            <div class="flex justify-between mx-8 mt-4">
                <div>

                </div>
                <div class="flex space-x-2 text-center align-center ">
                    <div>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa-solid fa-users mx-2 text-xl"></i>Marcar Usuários

                        </label>
                    </div>

                    <div>
                        <label for="file-upload" class="custom-file-upload ">
                            <i class="fa-solid fa-image mx-2 text-xl "></i>Adicionar Imagens
                        </label>
                        <input id="file-upload" multiple type="file" wire:model="coverImage" />
                        @error('coverImage')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" wire:submit.prevent="store" class="bg-purple-500 text-white px-6 py-2 rounded-md">Postar</button>
        </div>
    </form>
</div>
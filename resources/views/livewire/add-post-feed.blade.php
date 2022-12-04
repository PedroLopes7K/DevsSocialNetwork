<div>
    <form wire:submit.prevent="store" class="">
        <div class="grid mb-2">
            <label for="body" class="my-2"><b>Que tal postar algum conteúdo?</b></label>
            <textarea wire:model="body" id="body" class="border border-gray-300 focus:outline-purple-500 rounded-md" cols="10" rows="7"></textarea>

            <!-- <x-quill wire:model="body" /> -->

            @error('body')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror

            <!-- <div class="flex justify-between mx-8 mt-4">
                <div>

                </div>
                <div class="flex space-x-2 text-center align-center ">
                    <div>
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa-solid fa-users mx-2 text-xl"></i>Marcar Usuários

                        </label>
                    </div> -->

            <div class="mt-2">
                <label for="file-upload" class="custom-file-upload ">
                    <i class="fa-solid fa-image mx-2 text-xl "></i><b>Adicionar Imagem:</b>
                </label>
                <x-file-pond wire:model="coverImage">
                </x-file-pond>

                @error('cover')
                <x-form-error name="coverImage" />
                @enderror

            </div>
            <!-- </div>
            </div> -->
        </div>
        <div>
            <button type="submit" wire:submit.prevent="store" class="bg-purple-500 text-white px-6 py-2 rounded-md">Postar</button>
        </div>
    </form>


</div>
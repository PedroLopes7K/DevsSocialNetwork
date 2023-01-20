<div>
    <!-- <label for="text-post" class="my-2 text-gray-700"><b>Que tal postar algum conteúdo?</b></label> -->
    <h2 class="my-2 text-gray-700"><b>Que tal postar algum conteúdo?</b></h2>
    <form wire:submit.prevent="store" class="">
        <div class="grid mb-2">
            <!-- <textarea wire:model="body" id="text-post" class="border border-gray-300 focus:outline-purple-500 rounded-md" cols="10" rows="7"></textarea> -->
            <label class="block text-gray-700  mb-2" for="username">
                <b>Título:</b>
            </label>
            <input wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="titulo">

            <div class="mt-2">
                <label for="text-post" class="my-2 text-gray-700"><b>Conteúdo:</b></label>

                <x-quill wire:model="body" />
                @error('body')
                <div class="text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-4 flex justify-between mx-8">
                <div class="mb-3 w-96">
                    <label for="formFile" class="form-label inline-block mb-2 text-gray-700"> <i class="fa-solid fa-image mx-2 text-xl "></i><b>Adicionar Imagem:</b></label>
                    <input multiple wire:model="coverImage" class="form-control
                    
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
                <div class="mb-3">
                    <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sessão do Post</label>
                    <select id="section" wire:model="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Escolha uma opção</option>
                        @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" wire:submit.prevent="store" class="bg-purple-500 text-white px-6 py-2 rounded-md">Postar</button>
        </div>
    </form>


</div>
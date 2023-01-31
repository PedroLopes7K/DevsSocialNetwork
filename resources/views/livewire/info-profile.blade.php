<div>
    <!-- <h1>Nome: {{$name}}</h1>
    <h1>Email: {{$email}}</h1>
    <h1>Username: {{$username}}</h1> -->
    @if($editPhoto == false)
    <div class="p-16">
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{$myFriends}}</p>
                        <p class="text-gray-400">Amigos</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{$posts}}</p>
                        <p class="text-gray-400">Posts</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{$comments}}</p>
                        <p class="text-gray-400">Comentarios</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    <button wire:click="updatePhoto" class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Atualizar Foto
                    </button>

                </div>
            </div>

            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">{{ucfirst($name)}} <span class="font-light text-gray-500">21</span></h1>
                <p class="font-light text-gray-600 mt-3">Belo Horizonte, Brasil</p>

                <p class="mt-8 text-gray-500">Desenvolvedor - Trato Tech</p>
                <p class="mt-2 text-gray-500">Analista de Sistemas</p>
            </div>

            <div class="mt-12 flex flex-col justify-center">
                <p class="text-gray-600 text-center font-light lg:px-16">Um desensolvedor de software apaixonado por tecnologia e novos aprendizados.</p>
                <button class="text-indigo-500 py-2 px-4  font-medium mt-4">
                    Show more
                </button>
            </div>

        </div>
    </div>
    @else

    <div class="p-16 flex justify-center">
        <div class="flex flex-col max-w-md p-6 dark:bg-gray-900 dark:text-gray-100">
            <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl flex items-center justify-center text-indigo-500">
                <img src="https://source.unsplash.com/150x150/?portrait?3" alt="" class="w-48 h-48 mx-auto rounded-full dark:bg-gray-500 aspect-square">
            </div>
            <div class="mt-8">
                <form>

                    <div class="h-6"></div> <!-- just add some space -->

                    <!-- the second file input -->
                    <label>
                        <input type="file" class="text-sm text-grey-500
            file:mr-5 file:py-3 file:px-10
            file:rounded-full file:border-0
            file:text-md file:font-semibold  file:text-white
            file:bg-gradient-to-r file:from-blue-600 file:to-amber-600
            hover:file:cursor-pointer hover:file:opacity-80
          " />
                    </label>
                    <div class="flex justify-center mt-6">

                        <button class="px-4 py-2 rounded-md bg-purple-500 text-white">Atualizar foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endif
</div>
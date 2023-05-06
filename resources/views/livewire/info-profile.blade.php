<div>
    <div class="bg-gray-100">
        <div class="w-full text-white bg-amber-400">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="#" class="text-lg font-semibold tracking-widest uppercase rounded-lg focus:outline-none focus:shadow-outline"> {{ __('Seu Perfil: ') }} {{ucfirst($user->name)}}</a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center space-x-2 w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent hover:bg-blue-800 md:w-auto md:inline md:mt-0 md:ml-4 hover:bg-gray-200 focus:bg-blue-800 focus:outline-none focus:shadow-outline">
                            <span>{{ucfirst($user->name)}}</span>
                            @if($user->photo != null)

                            <img class="inline h-10 w-10 rounded-full" src="{{ asset('storage/' . $user->photo) }}">
                            @else
                            <img class="inline h-10 w-10 rounded-full" src="https://avatar-management--avatars.us-west-2.prod.public.atl-paas.net/default-avatar.png">

                            @endif
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 transition-transform duration-200 transform">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="py-2 bg-white text-blue-800 text-sm rounded-sm border border-main-color shadow-sm">
                                <a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#" wire:click="updatePhoto()">{{ $editPhoto ? 'Voltar' : 'Editar Foto'}}</a>
                                <a class="block px-4 py-2 mt-2 text-sm bg-white md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#" wire:click="changeEditData()">{{ $editData ? 'Voltar' : 'Editar Dados'}}</a>
                                <div class="border-b"></div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End of Navbar -->
        @if($editData == false && $editPhoto == false)

        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-amber-500">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto" src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg" alt="">
                        </div>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Descrição:</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                            {{$user->description ?? 'N/A'}}
                        </p>
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">

                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">Nov 07, 2016</span>
                            </li>
                        </ul>
                    </div>
                    <div class="my-4"></div>
                    <div class="bg-white p-3 hover:shadow">
                        <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-amber-400">
                                <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span>Amigos</span>
                        </div>
                        <div class="grid grid-cols-3">
                            @foreach($myFriends as $friend)
                            <div class="text-center my-2">
                                @if($friend->photo != null)
                                <img class="h-16 w-16 rounded-full mx-auto" src="{{ asset('storage/' . $friend->photo) }}" alt="">
                                @else
                                <img class="h-16 w-16 rounded-full mx-auto" src="https://avatar-management--avatars.us-west-2.prod.public.atl-paas.net/default-avatar.png" alt="">
                                @endif
                                <a href="{{ route('profile.other-user', $friend->id) }}" class="text-main-color">{{$friend->name}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-9/12 mx-2 h-64">

                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Sobre</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Primeiro Nome:</div>
                                    <div class="px-4 py-2">{{$user->name ?? 'N/A'}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Sobrenome:</div>
                                    <div class="px-4 py-2">{{$user->last_name ?? 'N/A'}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Genero:</div>
                                    <div class="px-4 py-2">{{$user->gender ?? 'N/A'}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contato:</div>
                                    <div class="px-4 py-2">{{$user->contact ?? 'N/A'}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Cidade:</div>
                                    <div class="px-4 py-2">{{$user->city ?? 'N/A'}}</div>
                                </div>

                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email:</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:jane@example.com">{{$user->email}}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nascimento:</div>
                                    <div class="px-4 py-2">{{$user->birth ?? 'N/A'}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Username:</div>
                                    <div class="px-4 py-2">{{$user->username ?? 'N/A'}}</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="my-4"></div>

                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <livewire:my-posts-profile :posts="$posts" />


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($editData == true)
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">

                <div class="mx-auto">



                    <div class="mt-4 flex ">
                        <div class="mr-2">
                            <x-input-label for="name" :value="__('Nome')" />

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus wire:model="name" />

                        </div>
                        <div>
                            <x-input-label for="last_name" :value="__('Sobrenome')" />

                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" autofocus wire:model="last_name" />

                        </div>
                    </div>

                    <div class="mt-4 flex ">
                        <div class="mr-2">
                            <x-input-label for="gender" :value="__('Genero')" />

                            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" autofocus wire:model="gender" />

                        </div>
                        <div>
                            <x-input-label for="username" :value="__('Apelido')" />

                            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autofocus wire:model="username" />

                        </div>
                    </div>

                    <div class="mt-4 flex ">
                        <div class="mr-2">
                            <x-input-label for="contact" :value="__('Contato')" />

                            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" autofocus wire:model="contact" />

                        </div>
                        <div>
                            <x-input-label for="city" :value="__('Cidade')" />

                            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" autofocus wire:model="city" />

                        </div>
                    </div>

                    <div class="mt-4  ">
                        <x-input-label for="birth" :value="__('Nascimento')" />


                        <div class="relative max-w-md">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input datepicker type="text" id="birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="birth" placeholder="Select date">
                        </div>


                    </div>

                    <div class="mt-4">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                        <textarea id="message" rows="4" wire:model="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

                    </div>
                    <div class="flex items-center justify-center mt-4">


                        <x-primary-button wire:click="updateData" class="ml-4">
                            {{ __('Atualizar Dados') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($editPhoto == true)
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 justify-center">
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>

                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-36 h-36 mb-3 rounded shadow-lg" src="{{ asset('storage/' . $user->photo) }}" alt="Bonnie image" />

                        <div class=" flex-col mt-4 space-x-3 md:mt-6">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" wire:model="profileImage" type="file" class="hidden" />
                                </label>


                            </div>
                            <div class="mt-2 flex justify-center">
                                <button wire:click="sendImage" class="bg-amber-400 text-white px-6 py-2 rounded-md">Alterar Foto</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>
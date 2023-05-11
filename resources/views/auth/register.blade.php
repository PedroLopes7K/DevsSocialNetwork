<x-app-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf



            <div class="mt-4 flex ">
                <div class="mr-2">
                    <x-input-label for="name" :value="__('Nome')" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="last_name" :value="__('Sobrenome')" />

                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" autofocus />

                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>
            </div>

            <div class="mt-4 flex ">
                <div class="mr-2">
                    <x-input-label for="gender" :value="__('Genero')" />

                    <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" autofocus />

                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="username" :value="__('Apelido')" />

                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autofocus />

                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
            </div>

            <div class="mt-4 flex ">
                <div class="mr-2">
                    <x-input-label for="contact" :value="__('Contato')" />

                    <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" autofocus />

                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="city" :value="__('Cidade')" />

                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" autofocus />

                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
            </div>

            <div class="mt-4  ">
                <x-input-label for="birth" :value="__('Nascimento')" />

                <!-- <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" autofocus /> -->
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input datepicker type="text" id="birth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>

                <x-input-error :messages="$errors->get('birth')" class="mt-2" />

            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4">
            <input  id="checked-checkbox" name="company" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
           <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Representa alguma empresa?</label>
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já é cadastrado?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
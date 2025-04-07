@auth

<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">

        <div class="w-full flex-col sm:max-w-md mt-6 px-6 py-4 bg-sky-950 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                    <x-application-logo class="rounded-full w-20 h-20 fill-current text-gray-500" />

            </div>
            <div class="max-w-md mx-auto p-4">
        <form action="{{ route('sugestaostore')}}" method="post">
            @csrf

        <div>
            <x-input-label for="name" class="text-white" :value="__('Título')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"  required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" class="text-white" :value="__('Descrição')" />
            <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" required  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('sugestaoindex') }}">
                {{ __('Gostaria de voltar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Criar') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-app-layout>
@endauth

@auth

<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">

        <div class="w-full flex-col sm:max-w-md mt-6 px-6 py-4 bg-sky-950 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                    <x-application-logo class="rounded-full w-20 h-20 fill-current text-white" />

            </div>
            <div class="max-w-md mx-auto p-4">
        <form action="{{ route('avisoupdate', $aviso->id_aviso) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-6">
                <x-input-label for="name"  class="text-white" :value="__('Titulo')" />
                <x-text-input id="titulo" name="titulo" class="block mt-1 w-full" type="text"  required />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="large-input" class="block mb-2 text-sm font-medium text-white text-white" :value="__('Seu aviso')" />
                <x-text-input type="text" id="conteudo" name="conteudo" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 text-black" required />
                <x-input-error :messages="$errors->get('conteudo')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('avisoindex') }}">
                    {{ __('Gostaria de voltar?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Editar') }}
                </x-primary-button>
            </div>
        </form>
    </x-app-layout>
@endauth


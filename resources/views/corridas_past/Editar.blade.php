@auth

<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

    <div class="w-full flex-col sm:max-w-md mt-6 px-6 py-4 bg-sky-950 shadow-md overflow-hidden sm:rounded-lg">
        <div class="flex justify-center">
                <x-application-logo class="rounded-full w-20 h-20 fill-current text-gray-500" />

        </div>
        <div class="max-w-md mx-auto p-4">
        <form action="{{ route('corridaupdate', $corrida->id_registro_corrida) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
        <div>
            <x-input-label for="name" class="text-white" :value="__('Nome do cliente')" />
            <x-text-input id="nome_cliente" class="block mt-1 w-full" type="text" name="nome_cliente"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" class="text-white" :value="__('Preço')" />
            <x-text-input id="preco" class="block mt-1 w-full" type="number" name="preco" />
            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="number" class="text-white" :value="__('Data')" />
            <input type="date" id="data" placeholder="John Doe" name="data" :value="old('data')" required autocomplete="username" class="block mt-1 w-full"/>
            <x-input-error :messages="$errors->get('data')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('corridaindex') }}">
                {{ __('Gostaria de voltar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Editar') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-app-layout>
@endauth

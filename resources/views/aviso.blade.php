@auth

<?php
$cargo = Auth::user()->cargo;
?>

<x-app-layout>
    <x-slot name="header">
        <div class="justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Avisos do Administrador') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="relative overflow-x-auto">


            <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                @if ($cargo == 2)
                @if (session()->has('editado'))
                <x-editado-aviso>
                </x-criado-aviso>
                @elseif (session()->has('apagado'))
                <x-apagado-aviso>
                </x-criado-aviso>
                @elseif (session()->has('criado'))
                <x-criado-aviso>
                </x-criado-aviso>
                        @endif
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Criar Aviso
                          </button>

                        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative p-4 bg-white rounded-lg shadow-sm dark:bg-gray-700">

                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Criar Aviso
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('avisostore') }}" method="post">
                                        @csrf
        <div class="mb-6 mt-3 col-span-2 sm:col-span-1">
            <x-input-label for="name" class="text-white" :value="__('Titulo')" />
            <x-text-input id="titulo" name="titulo" class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>
        <div class="mb-6 col-span-2 sm:col-span-1">
            <x-input-label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white" :value="__('Seu aviso')" />
            <x-text-input type="text" id="conteudo" name="conteudo" class="block mt-1 w-full"/>
            <x-input-error :messages="$errors->get('conteudo')" class="mt-2" />
        </div>
        <div class="flex justify-center">
            <button type="submit" class="mb-3 mx-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
             Criar Aviso
            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            @endif
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Título:</th>
                        <th scope="col" class="px-6 py-3">assunto:</th>
                        <th scope="col" class="px-6 py-3">Data:</th>
                        <th scope="col" class="px-6 py-3">Editar</th>
                        <th scope="col" class="px-6 py-3">Apagar</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sugestoes = collect();
                    foreach ($users as $user) {
                        $sugestoes = $sugestoes->merge($user->sugestoes);
                    }
                @endphp
                    @forelse ($user->avisos as $aviso)
                            <tr class="bg-gray-100 justify-center border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 text-white">{{ $aviso->titulo }}</td>
                                <td class="px-6 py-4 text-white">{{ $aviso->conteudo }}</td>
                                <td class="px-6 py-4 text-white">{{ $aviso->created_at->format('d/m/Y H:i') }}</td>
                                @if ($cargo == 1)
                                <td colspan="2" class="px-6 py-4"></td>
@elseif ($cargo == 2)
                                <td class="px-6 py-4">
                                        <button data-modal-target="modal1" data-modal-toggle="modal1" class="block mb-3 text-white bg-yellow-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                            Editar Aviso
                                          </button>

                                        <div id="modal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative p-4 bg-white rounded-lg shadow-sm dark:bg-gray-700">

                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Editar Aviso
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal1+">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('avisoupdate', ['avis' => $aviso->id_aviso]) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-6 mt-3 col-span-2 sm:col-span-1">
                            <x-input-label for="name" class="text-white" :value="__('Titulo')" />
                            <x-text-input id="titulo" name="titulo" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('titulo')" value="{{ $aviso->titulo }}" class="mt-2" />
                        </div>
                        <div class="mb-6 col-span-2 sm:col-span-1">
                            <x-input-label for="large-input" class="block mb-2 text-sm font-medium text-white dark:text-white" :value="__('Seu aviso')" />
                            <x-text-input type="text" id="conteudo" name="conteudo" class="block mt-1 w-full"/>
                            <x-input-error :messages="$errors->get('conteudo')" value="{{ $aviso->conteudo }}" class="mt-2" />
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="mb-3 mx-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                             Editar
                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td class="px-6 py-4">

                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-pink-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-blue-800" type="button">
                                        Apagar
                                        </button>

                                        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza que quer apagar?</h3>
                                                        <div class="flex justify-center">
                                                            <form action="{{ route('avisodelete', ['aviso' => $aviso->id_aviso]) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded ">Apagar</button>
                                                            </form>
                                                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
@endif
@empty
                            <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="5" class="px-6 py-4 text-center text-white">
                                    Nenhum aviso registrado.
                                </td>
                            </tr>
@endforelse

                </tbody>
            </table>
        </div>
</x-app-layout>

@endauth

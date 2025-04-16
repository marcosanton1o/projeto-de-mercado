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
                    @forelse ($users as $user)
                    @foreach ($user->avisos as $aviso)
                            <tr class="bg-white">
                                <td class="px-6 py-4">{{ $aviso->titulo }}</td>
                                <td class="px-6 py-4">{{ $aviso->conteudo }}</td>
                                <td class="px-6 py-4">{{ $aviso->created_at->format('d/m/Y H:i') }}</td>
@if ($cargo == 2)
                                <td class="px-6 py-4">
                                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block mb-3 text-white bg-yellow-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                            Editar Aviso
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
                                                    <form action="{{ route('avisoupdate', ['avis' => $aviso->id_aviso]) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="PUT">
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
                             Editar
                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                <td class="px-6 py-4">
                                    <button id="openModalButton" class="px-4 py-2 text-white bg-transparent rounded">
                                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>

                                    <dialog id="modal" class="relative p-6 bg-white rounded-lg shadow-lg">
                                        <button id="closeModalButtonTop" class="close-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                        <h2 class="mb-4 text-lg font-semibold">Apagar?</h2>
                                        <p class="mb-4 text-gray-700">Você tem certeza de que quer apagar?</p>
                                        <div class="flex justify-end space-x-2">
                                            <button id="closeModalButtonBottom" class="px-4 py-2 text-white bg-gray-500 rounded">
                                                Sair
                                            </button>
                                            <form action="{{ route('avisodelete', ['aviso' => $aviso->id_aviso]) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded ">Apagar</button>
                                            </form>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>

@else
<th colspan="2" class="px-6 py-3"></th>
                                @endif
                            </tr>
@endforeach
                        @empty
                            <tr class="justify-center bg-gray-100">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Nenhum aviso registrada.
                                </td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
</x-app-layout>

@endauth

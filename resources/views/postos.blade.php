<?php
$cargo = Auth::user()->cargo;
?>

<x-app-layout>
    <x-slot name="header">
        <x-slot name="header">
            <div class="justify-between">
                    <h2 class="font-semibold text-xl text-black leading-tight">
                        {{ __('Seu Posto')}}
                    </h2>
                </div>
                </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

@if($cargo == 3)

<div class="relative overflow-x-auto">
    <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID:
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome:
                </th>
                <th scope="col" class="px-6 py-3">
                    Email:
                </th>
                <th scope="col" class="px-6 py-3">
                    Numero de Telefone:
                </th>
                <th scope="col" class="px-6 py-3">
                    Data de Nascimento:
                </th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $user)
            <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->numero_tel }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->data_nascimento }}
                </td>
            </tr>

@endforeach
        </tbody>
    </table>
</div>

@elseif($cargo == 2)
<div class="relative overflow-x-auto">
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
    <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <a href="{{ route('users.create') }}" class="inline-block px-6 py-2 mb-2 text-white bg-sky-800 hover:bg-blue-700 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Criar Membro
        </a>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID:
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome:
                </th>
                <th scope="col" class="px-6 py-3">
                    Email:
                </th>
                <th scope="col" class="px-6 py-3">
                    Numero de Telefone:
                </th>
                <th scope="col" class="px-6 py-3">
                    Data de Nascimento:
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Apagar
                </th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $user)
            <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->numero_tel }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->data_nascimento }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.users.edit',['user' => $user->id])}}">
                    <svg class="h-8 w-8 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </a>
                </td>
                <td class="px-6 py-4">
                    <button id="openModalButton" class="px-4 py-2 text-white bg-transparent rounded">
                        <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                          </svg>

                      </button>

                      <dialog id="modal" class="relative p-6 bg-white rounded-lg shadow-lg">
                        <button id="closeModalButtonTop" class="close-button">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                        <h2 class="mb-4 text-lg font-semibold">Apagar {{ $user->name }}</h2>
                        <p class="mb-4 text-gray-700">
                          Você tem certeza de que quer apagar?
                        </p>
                        <div class="flex justify-end space-x-2">
                          <button id="closeModalButtonBottom" class="px-4 py-2 text-white bg-gray-500 rounded">
                            Sair
                          </button>
<form action="{{ route('admin.users.delete',['user' => $user->id])}}" method="post">
@csrf
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="px-4 py-2 text-white bg-red-600 rounded ">Apagar</button>
                        </form>
                        </div>
                      </dialog>
                </td>
            </tr>

@endforeach
        </tbody>
    </table>
</div>
@elseif($cargo == 1)

<div class="relative overflow-x-auto">
    <table class="w-full min-w-full text-sm text-left col rtl:text-right text-gray-500 dark:text-gray-400">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Estado:
                </th>
                <th scope="col" class="px-6 py-3">
                    Cidade:
                </th>
                <th scope="col" class="px-6 py-3">
                    Numero de Telefone:
                </th>
                <th scope="col" class="px-6 py-3">
                    cep:
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Apagar
                </th>
            </tr>
        </thead>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Criar posto
          </button>

        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Criar novo posto
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                        <form class="p-4 md:p-5" action="{{ route('postostore')}}" method="post">
                             @csrf
                            <div class="grid gap-4 my-4 mx-3 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="cidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Cidade')"/>
                                <x-text-input id="cidaded" class="block mt-1 w-full" type="text" name="local_cidade" />
                                <x-input-error :messages="$errors->get('local_cidade')" class="mt-2" />
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="numero_tel_posto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Número de telefone do posto')"/>
                                <x-text-input id="numero_tel_posto" class="block mt-1 w-full" type="text" name="numero_tel_posto" />
                                <x-input-error :messages="$errors->get('numero_tel_posto')" class="mt-2" />
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Estado')"/>
                                <x-text-input id="estado" class="block mt-1 w-full" type="text" name="local_estado" />
                                <x-input-error :messages="$errors->get('local_estado')" class="mt-2" />
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="cep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('CEP')"/>
                                <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" />
                                <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                            </div>
                        </div>
                        <button type="submit" class="mb-3 mx-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Adicionar posto
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <tbody>
            @foreach ($postos as $posto)
            <tr class="bg-gray-100 justify-center border-b dark:bg-gray-800 dark:border-gray-700">

                        <td  class="px-6 py-4">
                            {{ $posto->local_cidade }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $posto->numero_tel_posto }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $posto->local_estado }}
                        </td>
                        <td  class="px-6 py-4 text-white">
                            {{ $posto->cep }}
                        </td>
<td>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-yellow-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-blue-800" type="button">
                            Editar
                            </button>

                            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Editar o posto
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('postoupdate',['post' => $posto->id_posto]) }}" method="post">
                                            @csrf

            <input type="hidden" name="_method" value="PUT">

                                                <div class="grid gap-4 my-4 mx-3 flex justify-center grid-cols-2">
                                                <div class="col-span-2 sm:col-span-1">
                                                    <x-input-label for="cidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Cidade')"/>
                                                    <x-text-input id="cidade" class="block mt-1 w-full" type="text" value="{{ $posto->local_cidade }}" name="local_cidade" />
                                                    <x-input-error :messages="$errors->get('local_cidade')" class="mt-2" />
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <x-input-label for="numero_tel_posto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Número de telefone do posto')"/>
                                                    <x-text-input id="numero_tel_posto" class="block mt-1 w-full" type="text" value="{{ $posto->numero_tel_posto }}" name="numero_tel_posto" />
                                                    <x-input-error :messages="$errors->get('numero_tel_posto')" class="mt-2" />
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <x-input-label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Estado')"/>
                                                    <x-text-input id="estado" class="block mt-1 w-full" type="text" value="{{ $posto->local_estado }}" name="local_estado" />
                                                    <x-input-error :messages="$errors->get('local_estado')" class="mt-2" />
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <x-input-label for="cep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('CEP')"/>
                                                    <x-text-input id="cep" class="block mt-1 w-full" type="text" value="{{ $posto->cep }}" name="cep" />
                                                    <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="flex justify-center">
                                            <button type="submit" class="mb-3 mx-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                             Editar posto
                                            </button>

                                        </form>
                                            </div>
                                        </div>
                                        </div>
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
                                                    <form action="{{ route('postodelete',['posto' => $posto->id_posto])}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Apagar</button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                    </tr>
                        @endforeach
        </tbody>
    </table>
</div>


@endif

        </div>
    </div>
</x-app-layout>

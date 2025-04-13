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
    <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID:
                </th>
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

        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
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
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>
                            </div>
                            <button type="submit" class="mb-3 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Adicionar posto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <tbody>
            @foreach ($postos as $posto)
            <tr class="bg-gray-100 justify-center border-b dark:bg-gray-800 dark:border-gray-700">

                <td colspan="5" class="px-6 text-center py-4">
                    <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $posto->id_posto }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $posto->local_cidade }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $posto->numero_tel_posto }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $posto->local_estado }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $posto->cep }}
                        </td>
                        <td class="px-6 py-4">

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
                                    <form action="{{ route('postodelete', ['posto' => $posto->id_posto]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded ">Apagar</button>
                                    </form>
                                </div>
                            </dialog>
                        </td>
                    </tr>
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

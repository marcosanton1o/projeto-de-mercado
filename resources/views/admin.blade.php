<?php
$cargo = Auth::user()->cargo;

if($cargo == 1){
    return redirect()->route('admin_postindex');
}
elseif($cargo == 3){
return redirect()->route('userindex');
}
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bem vindo a página principal ') . Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                <x-logado>
                </x-logado>
                @endif
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-center px-4 pt-4">
                        <h5 class="text-center text-lg font-medium text-gray-900 dark:text-white">
                            {{ $totalPostos }}
                        </h5>
                    </div>
                    <div class="flex flex-col items-center pb-10">

                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Quantidade de postos</h5>
                        <div class="flex mt-4 md:mt-6">
                            <a href="{{ route('postoindex') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver Postos
                            </a> </div>
                    </div>
                </div>

                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-center px-4 pt-4">
                        <h5 class="text-center text-lg font-medium text-gray-900 dark:text-white">
                            {{ $totalPostos }}
                        </h5>
                    </div>
                    <div class="flex flex-col items-center pb-10">

                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Quantidade de postos</h5>
                        <div class="flex mt-4 md:mt-6">
                            <a href="{{ route('sugestaoindex') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver Sugestões
                            </a> </div>
                    </div>
                </div>

                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-center px-4 pt-4">
                        <h5 class="text-center text-lg font-medium text-gray-900 dark:text-white">
                            {{ $totalPostos }}
                        </h5>
                    </div>
                    <div class="flex flex-col items-center pb-10">

                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Quantidade de postos</h5>
                        <div class="flex mt-4 md:mt-6">
                            <a href="{{ route('postoindex') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ver Postos
                            </a> </div>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>

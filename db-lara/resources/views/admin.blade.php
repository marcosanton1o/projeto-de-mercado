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
        </div>
    </div>
</x-app-layout>

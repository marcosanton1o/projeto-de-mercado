<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased justify-center">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">

            <div class="w-full flex-col sm:max-w-md mt-6 px-6 py-4 bg-yellow-400 shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-center">
                        <x-application-logo class="rounded-full w-20 h-20 fill-current text-gray-500" />
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

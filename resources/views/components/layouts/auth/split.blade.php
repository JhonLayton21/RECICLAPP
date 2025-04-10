<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-4 lg:px-0">
            <div class="bg-muted col-span-1 relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
                <div class="absolute inset-0 bg-primary"></div>
                <a href="{{ route('home') }}" class="relative z-20 flex items-center text-5xl font-bold" wire:navigate>
                    <span class="flex h-20 w-20 items-center justify-center rounded-md">
                        <x-app-logo-icon class="me-2 h-16 w-16 fill-current text-[#C8E1AE]!" />
                    </span>
                    {{ config('app.name', 'Reciclapp') }}
                </a>           

                <img src="{{ asset('imgStart.png') }}"
                alt="Imagen reciclaje"
                class="absolute z-30 left-[40%] rotate-15 bottom-0 h-[600px] object-contain" />
            </div>
            <div class="w-full lg:p-8 col-span-3">
                <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>

                        <span class="sr-only">{{ config('app.name', 'Reciclapp') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>

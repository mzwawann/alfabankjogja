<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row mt-4">
                <div class="flex flex-row space-x-3 items-center p-6">
                    <div class="mr-2">{{ __('Menu :') }}</div>
                    <a href="/siswa" class="underline capitalize hover:text-blue-800">data siswa</a>
                    <a href="{{ route('guests.index') }}" class="underline capitalize hover:text-blue-800">buku tamu</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

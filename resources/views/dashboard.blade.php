<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-10">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-row mt-4">
                <div class="flex flex-row space-x-2 items-center p-6">
                    <div>{{ __('Menu :') }}</div>
                    <a href="/posts">
                        <div
                            class="bg-gray-800 text-white p-2 ms-3 rounded-md text-center hover:bg-gray-700 flex flex-row transition duration-200 ease-in-out">
                            <svg class="w-6 h-6 text-gray-300 dark:text-white mr-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h1v2a1 1 0 0 0 1.707.707L9.414 13H15a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M8.023 17.215c.033-.03.066-.062.098-.094L10.243 15H15a3 3 0 0 0 3-3V8h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-1v2a1 1 0 0 1-1.707.707L14.586 18H9a1 1 0 0 1-.977-.785Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div>Article</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

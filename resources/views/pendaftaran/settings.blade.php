<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mx-auto">
        <h2 class="text-xl font-bold mb-4 capitalize">{{ $banner }}</h2>

        <form action="{{ route('settings.upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 mt-4 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                <div class="relative w-full">
                    <input type="file" name="file_path" id="file_path" accept=".pdf"
                        class="border-gray-300 rounded-md mr-8">
                </div>
                <div>
                    <button type="submit"
                        class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 capitalize">
                        {{ $upload }}
                    </button>
                </div>
            </div>
            <a href="/siswa"
                class="font-medium text-sm text-blue-600 hover:underline capitalize mr-2">&laquo;kembali</a>
            <a href="/pendaftaran" class="font-medium text-sm text-blue-600 hover:underline capitalize">pendaftaran</a>
        </form>
        <div class="mt-4 mb-8 w-full">
            @if (session('success'))
                <div id="success-message"
                    class="mb-4 p-4 bg-green-500 w-full text-white rounded-lg shadow-lg flex items-center transition-opacity duration-500 ease-in-out">
                    <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="removeAlert()"
                        class="ml-auto bg-transparent text-white hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const successMessage = document.getElementById('success-message');
                            if (successMessage) {
                                setTimeout(() => {
                                    successMessage.style.opacity = '0';
                                    setTimeout(() => {
                                        successMessage.remove();
                                    }, 500);
                                }, 5000);
                            }
                        });

                        function removeAlert() {
                            const successMessage = document.getElementById('success-message');
                            successMessage.remove();
                        }
                    </script>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @error('document')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="p-2">
        <ul class="list-disc space-y-2">
            @foreach ($settings as $setting)
                <li class="flex space-x-2">
                    <div class="flex items-center space-x-2 mt-2">
                        <a href="{{ asset('storage/' . $setting->file_path) }}" target="_blank"
                            class="flex items-center text-blue-800 underline hover:text-red-800 mr-2">
                            <x-pdf-logo />{{ basename($setting->file_path) }}
                        </a>
                        <a href="{{ asset('storage/' . $setting->file_path) }}" download
                            class="ml-6 text-green-500 hover:underline capitalize">{{ $download }}
                        </a>
                        <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ basename($setting->file_path) }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-500 hover:underline ml-2 capitalize">{{ $destroy }}</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>

<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mx-auto p-4 sm:p-6 lg:p-8" x-data="{ open: false, search: '', guestName: '', deleteUrl: '' }" @keydown.window.escape="open = false">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-2">
                <h1 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-4 sm:mb-0 mr-2">Daftar Tamu</h1>
                <input type="text" x-model="search" placeholder="Cari tamu..."
                    class="px-4 py-2 mr-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full sm:w-64 shadow-lg">
                <a href="{{ route('guests.create') }}"
                    class="bg-blue-600 text-white px-6 py-2 text-sm rounded-full shadow-lg hover:bg-blue-700">Tambahkan
                    Tamu</a>
                <button id="copy-btn" onclick="copyToClipboard()" class="text-gray-600 flex items-center space-x-1">
                    <span id="icon-copy">
                        <svg class="w-6 h-6 text-gray-600 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M9 8v3a1 1 0 0 1-1 1H5m11 4h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v1m4 3v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L7.7 8.35A1 1 0 0 1 8.46 8H13a1 1 0 0 1 1 1Z" />
                        </svg>

                    </span>
                    <span id="icon-check" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    <span id="button-text">Salin link form buku tamu</span>
                </button>
            </div>
            <div id="notification"
                class="hidden fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
                Link berhasil disalin!
            </div>
        </div>

        <script>
            function copyToClipboard() {
                const link = 'http://alfabankjogja.test:8080/guestsbook';

                const textArea = document.createElement("textarea");
                textArea.value = link;
                textArea.style.position = "fixed";
                textArea.style.left = "-9999px";
                document.body.appendChild(textArea);

                textArea.select();

                try {
                    document.execCommand('copy');
                    showNotification('Link berhasil disalin!');
                    toggleIcon();
                } catch (err) {
                    console.error('Gagal menyalin link', err);
                }

                document.body.removeChild(textArea);
            }

            function showNotification(message) {
                const notification = document.getElementById('notification');
                notification.textContent = message;
                notification.classList.remove('hidden');
                setTimeout(() => {
                    notification.classList.add('hidden');
                }, 3000);
            }

            function toggleIcon() {
                const copyIcon = document.getElementById('icon-copy');
                const checkIcon = document.getElementById('icon-check');
                const buttonText = document.getElementById('button-text');

                copyIcon.classList.add('hidden');
                checkIcon.classList.remove('hidden');
                buttonText.textContent = 'Link Tersalin!';

                setTimeout(() => {
                    copyIcon.classList.remove('hidden');
                    checkIcon.classList.add('hidden');
                    buttonText.textContent = 'Salin Link';
                }, 3000);
            }
        </script>

        @if (session('success'))
            <div id="success-message"
                class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow-lg flex items-center transition-opacity duration-500 ease-in-out">
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
                            }, 2800);
                        }
                    });

                    function removeAlert() {
                        const successMessage = document.getElementById('success-message');
                        successMessage.remove();
                    }
                </script>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4 sm:p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left whitespace-no-wrap">
                        <thead class="bg-gray-50 border-b text-center">
                            <tr>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">No</th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Timestamp</th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Nama</th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Nomor telepon</th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Status pendidikan</th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Kursus yang diminati
                                </th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Tahu alfabank dari?
                                </th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Tujuan/motivasi kursus
                                </th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Status</th>
                                <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">FU</th>
                                @if (Route::has('login'))
                                    @auth
                                        <th class="px-4 py-2 text-gray-600 font-medium whitespace-nowrap">Actions
                                        </th>
                                    @endauth
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($guests as $index => $guest)
                                <tr class="hover:bg-gray-50"
                                    x-show="search === '' 
                                        || '{{ strtolower($guest->index) }}'.includes(search.toLowerCase()) 
                                        || '{{ strtolower($guest->created_at) }}'.includes(search.toLowerCase()) 
                                        || '{{ strtolower($guest->name) }}'.includes(search.toLowerCase())
                                        || '{{ strtolower($guest->telepon) }}'.includes(search.toLowerCase())
                                        || '{{ strtolower($guest->status_pendidikan) }}'.includes(search.toLowerCase())
                                        || '{{ strtolower($guest->kursus) }}'.includes(search.toLowerCase()) 
                                        || '{{ strtolower($guest->tahu_alfabank_dari) }}'.includes(search.toLowerCase())
                                        || '{{ strtolower($guest->tujuan_motivasi_kursus) }}'.includes(search.toLowerCase())
                                        || '{{ strtolower($guest->status) }}'.includes(search.toLowerCase())
                                        || '{{ strtolower($guest->FU) }}'.includes(search.toLowerCase())">
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $guest->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">{{ $guest->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">{{ $guest->telepon }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $guest->status_pendidikan }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">{{ $guest->kursus }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $guest->tahu_alfabank_dari }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $guest->tujuan_motivasi_kursus }}</td>
                                    <td class="px-4 py-2 font-bold whitespace-nowrap overflow-auto">
                                        @switch($guest->status)
                                            @case('Info')
                                                <span class="text-red-500">{{ $guest->status }}</span>
                                            @break

                                            @case('Her')
                                                <span class="text-green-500">{{ $guest->status }}</span>
                                            @break

                                            @default
                                                <span>{{ $guest->status }}</span>
                                        @endswitch
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">{{ $guest->FU }}</td>
                                    @if (Route::has('login'))
                                        @auth
                                            <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                                <div class="flex justify-center space-x-1">
                                                    <a href="{{ route('guests.edit', $guest->id) }}"
                                                        class="bg-blue-600 hover:bg-blue-800 p-2 rounded-md flex">
                                                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                        </svg>
                                                        <span class="capitalize text-white">edit</span>
                                                    </a>
                                                    <button
                                                        @click="open = true; guestName = '{{ $guest->name }}'; deleteUrl = '{{ route('guests.destroy', $guest->id) }}';"
                                                        class="bg-red-600 hover:bg-red-800 p-2 rounded-md flex">
                                                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                        </svg>
                                                        <span class="capitaliize text-white">hapus</span>
                                                    </button>
                                                </div>
                                            </td>
                                        @endauth
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform scale-95 opacity-0"
            x-transition:enter-end="transform scale-100 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform scale-100 opacity-100"
            x-transition:leave-end="transform scale-95 opacity-0"
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h3 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus</h3>
                <p class="mt-2 text-gray-600">Apakah kamu yakin ingin menghapus <span x-text="guestName"></span> dari
                    daftar tamu?</p>
                <div class="mt-4 flex justify-end space-x-4">
                    <button @click="open = false"
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300">Batal</button>
                    <form :action="deleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeAlert() {
            const successMessage = document.getElementById('success-message');
            successMessage.remove();
        }
    </script>
</x-layout>

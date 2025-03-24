<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="container mx-auto p-4 sm:p-6 lg:p-8" x-data="{ open: false, search: '', courseRegistrationNama_lengkap: '', deleteUrl: '' }" @keydown.window.escape="open = false">
        <div class="flex flex-col sm:flex-row sm:items-center space-y-3 sm:space-y-0 sm:space-x-2 mb-4">
            <input type="text" x-model="search" placeholder="Cari data siswa..."
                class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full sm:w-64 shadow-lg">
            <a href="/pendaftaran"
                class="bg-blue-600 text-white px-6 py-2 text-sm rounded-full shadow-lg hover:bg-blue-700 capitalize">pendaftaran</a>
            <div class="flex space-x-2">
                <a href="/settings">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35"
                        viewBox="0 0 128 128">
                        <path fill="#cadbea"
                            d="M106.9,55.3c-0.8-2.8-1.8-5.4-3.2-7.9l8.8-8.8L99.8,26l-8.8,8.8c-4.9-2.8-10.5-4.3-16.3-4.4l-3.2-12l-17.3,4.6l3.2,12c-5,2.9-9.1,7.1-11.9,11.9l-12-3.2L29,61.1l12,3.2c0,2.8,0.4,5.6,1.1,8.4c0.8,2.8,1.8,5.4,3.2,7.9l-8.8,8.8L49.2,102l8.8-8.8c4.9,2.8,10.5,4.3,16.3,4.4l3.2,12l17.3-4.6l-3.2-12c5-2.9,9.1-7.1,11.9-11.9l12,3.2l4.6-17.3l-12-3.2C108.1,60.9,107.7,58.1,106.9,55.3z M78.6,79.1c-8.4,2.2-16.9-2.7-19.2-11.1s2.7-16.9,11.1-19.2c8.4-2.2,16.9,2.7,19.2,11.1C91.9,68.3,86.9,76.9,78.6,79.1z">
                        </path>
                        <path fill="#fff"
                            d="M96.9,55.3c-0.8-2.8-1.8-5.4-3.2-7.9l8.8-8.8L89.8,26l-8.8,8.8c-4.9-2.8-10.5-4.3-16.3-4.4l-3.2-12l-17.3,4.6l3.2,12c-5,2.9-9.1,7.1-11.9,11.9l-12-3.2L19,61.1l12,3.2c0,2.8,0.4,5.6,1.1,8.4c0.8,2.8,1.8,5.4,3.2,7.9l-8.8,8.8L39.2,102l8.8-8.8c4.9,2.8,10.5,4.3,16.3,4.4l3.2,12l17.3-4.6l-3.2-12c5-2.9,9.1-7.1,11.9-11.9l12,3.2l4.6-17.3l-12-3.2C98.1,60.9,97.7,58.1,96.9,55.3z M68.6,79.1c-8.4,2.2-16.9-2.7-19.2-11.1s2.7-16.9,11.1-19.2c8.4-2.2,16.9,2.7,19.2,11.1C81.9,68.3,76.9,76.9,68.6,79.1z">
                        </path>
                        <path fill="#3f4a54"
                            d="M67.5,112.5c-1.3,0-2.5-0.9-2.9-2.2l-2.6-9.8c-4.6-0.3-9.2-1.6-13.4-3.6l-7.2,7.2c-1.2,1.2-3.1,1.2-4.2,0L24.4,91.4c-1.2-1.2-1.2-3.1,0-4.2l7.2-7.2c-1-2.1-1.8-4.3-2.4-6.5c-0.6-2.3-1-4.6-1.2-6.9L18.2,64c-0.8-0.2-1.4-0.7-1.8-1.4s-0.5-1.5-0.3-2.3L20.7,43c0.2-0.8,0.7-1.4,1.4-1.8c0.7-0.4,1.5-0.5,2.3-0.3l9.8,2.6c2.6-3.9,5.9-7.2,9.8-9.8l-2.6-9.8c-0.4-1.6,0.5-3.2,2.1-3.7l17.3-4.6c1.6-0.4,3.2,0.5,3.7,2.1l2.6,9.8c4.6,0.3,9.2,1.6,13.4,3.6l7.2-7.2c1.1-1.1,3.1-1.1,4.2,0l12.7,12.7c1.2,1.2,1.2,3.1,0,4.2L97.4,48c1,2.1,1.8,4.3,2.4,6.5c0.6,2.3,1,4.6,1.2,6.9l9.8,2.6c1.6,0.4,2.5,2.1,2.1,3.7L108.3,85c-0.2,0.8-0.7,1.4-1.4,1.8c-0.7,0.4-1.5,0.5-2.3,0.3l-9.8-2.6c-2.6,3.9-5.9,7.2-9.8,9.8l2.6,9.8c0.4,1.6-0.5,3.2-2.1,3.7l-17.3,4.6C68,112.5,67.7,112.5,67.5,112.5z M48,90.2c0.5,0,1,0.1,1.5,0.4c4.5,2.6,9.6,3.9,14.8,4c1.3,0,2.5,0.9,2.9,2.2l2.4,9.1l11.5-3.1l-2.4-9.1c-0.3-1.3,0.2-2.7,1.4-3.4c4.5-2.6,8.2-6.4,10.8-10.8c0.7-1.2,2.1-1.7,3.4-1.4l9.1,2.4l3.1-11.5l-9.1-2.4c-1.3-0.3-2.2-1.5-2.2-2.9c0-2.6-0.4-5.2-1-7.7l0,0c-0.7-2.5-1.7-4.9-2.9-7.2c-0.7-1.2-0.5-2.6,0.5-3.6l6.6-6.6l-8.4-8.4l-6.6,6.6c-1,1-2.4,1.2-3.6,0.5c-4.5-2.6-9.6-3.9-14.8-4c-1.3,0-2.5-0.9-2.9-2.2l-2.4-9.1L48,25.2l2.4,9.1c0.3,1.3-0.2,2.7-1.4,3.4c-4.5,2.6-8.2,6.4-10.8,10.8c-0.7,1.2-2.1,1.7-3.4,1.4l-9.1-2.4l-3.1,11.5l9.1,2.4c1.3,0.3,2.2,1.5,2.2,2.9c0,2.6,0.4,5.2,1,7.7c0.7,2.5,1.7,4.9,2.9,7.2c0.7,1.2,0.5,2.6-0.5,3.6l-6.6,6.6l8.4,8.4l6.7-6.6C46.4,90.5,47.2,90.2,48,90.2z M64.5,82.7c-3.2,0-6.4-0.8-9.3-2.5c-4.3-2.5-7.4-6.5-8.7-11.3c-1.3-4.8-0.6-9.8,1.9-14.2c2.5-4.3,6.5-7.4,11.3-8.7c9.9-2.7,20.2,3.3,22.9,13.2c1.3,4.8,0.6,9.8-1.9,14.2c-2.5,4.3-6.5,7.4-11.3,8.7l0,0C67.7,82.5,66.1,82.7,64.5,82.7z M68.6,79.1L68.6,79.1L68.6,79.1z M64.5,51.3c-1.1,0-2.2,0.1-3.3,0.4c-3.3,0.9-6,3-7.7,5.9c-1.7,2.9-2.1,6.3-1.3,9.6c0.9,3.3,3,6,5.9,7.7c2.9,1.7,6.3,2.1,9.6,1.3l0,0c3.3-0.9,6-3,7.7-5.9c1.7-2.9,2.1-6.3,1.3-9.6C75.2,55.1,70.1,51.3,64.5,51.3z">
                        </path>
                    </svg>
                </a>
                <div class="flex items-center space-x-4">
                    <button id="copy-btn" onclick="copyToClipboard()"
                        class="text-gray-600 flex items-center space-x-1">
                        <span id="icon-copy">
                            <svg class="w-6 h-6 text-gray-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M9 8v3a1 1 0 0 1-1 1H5m11 4h2a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1h-7a1 1 0 0 0-1 1v1m4 3v10a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-7.13a1 1 0 0 1 .24-.65L7.7 8.35A1 1 0 0 1 8.46 8H13a1 1 0 0 1 1 1Z" />
                            </svg>
                        </span>
                        <span id="icon-check" class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </span>
                        <span id="button-text">Salin link pendaftaran</span>
                    </button>
                </div>
            </div>
        </div>
        <div id="notification"
            class="hidden fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
            Link berhasil disalin!
        </div>

        <script>
            function copyToClipboard() {
                const link = 'http://alfabankjogja.test:8080/pendaftaran';

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

        <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-6">
            <div class="p-4 sm:p-6">
                <div class="overflow-x-auto">
                    <table class="w-full text-left whitespace-no-wrap">
                        <thead class="bg-gray-50 border-b text-center">
                            <tr>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    no</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    waktu pendaftaran</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    ketentuan dan kebijakan</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    NIS</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    kode kelas</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    nama lengkap</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    tempat lahir</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    tanggal lahir</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    jenis kelamin</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    agama</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    alamat lengkap</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    foto ktp</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    telepon</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    telepon orang tua</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    instagram</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    status</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    asal sekolah/kampus</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    pekerjaan</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    bekerja di</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    jenis program</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    model pembelajaran</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    program studi</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    jam pilihan</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    mulai pendidikan</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    tahu alfabank dari</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    nama ibu</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    nama ayah</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    alat transportasi</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    KIP</th>
                                <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                    KPS</th>
                                @if (Route::has('login'))
                                    @auth
                                        <th class="px-4 py-2 text-gray-600 font-medium capitalize whitespace-nowrap">
                                            action</th>
                                    @else
                                    @endauth
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($registrations as $index => $registration)
                                <tr class="hover:bg-gray-50"
                                    x-show="search === '' 
                                    || '{{ strtolower($registration->index) }}'.includes(search.toLowerCase()) 
                                    || '{{ strtolower($registration->created_at) }}'.includes(search.toLowerCase()) 
                                    || '{{ strtolower($registration->ketentuan_dan_kebijakan) }}'.includes(search.toLowerCase()) 
                                    || '{{ strtolower($registration->nama_lengkap) }}'.includes(search.toLowerCase()) 
                                    || '{{ strtolower($registration->nomor_induk_siswa) }}'.includes(search.toLowerCase()) 
                                    || '{{ strtolower($registration->kode_kelas) }}'.includes(search.toLowerCase()) 
                                    || '{{ strtolower($registration->tempat_lahir) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->tanggal_lahir) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->jenis_kelamin) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->agama) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->alamat_lengkap) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->telepon) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->telepon_orangtua) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->akun_instagram) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->status) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->asal_sekolah_kampus) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->pekerjaan) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->bekerja_di) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->jenis_program) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->model_pembelajaran) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->program_studi) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->jam_pilihan) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->mulai_pendidikan) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->informasi) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->nama_ibu) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->nama_ayah) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->alat_transportasi) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->KIP) }}'.includes(search.toLowerCase())
                                    || '{{ strtolower($registration->KPS) }}'.includes(search.toLowerCase())">
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $index + 1 }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->ketentuan_dan_kebijakan }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->nomor_induk_siswa }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->kode_kelas }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->nama_lengkap }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->tempat_lahir }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->tanggal_lahir }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->jenis_kelamin }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->agama }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->alamat_lengkap }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        <img src="{{ asset('storage/' . $registration->photo_ktp) }}"
                                            class="w-15 object-cover cursor-pointer rounded-sm"
                                            onclick="showPreviewModal('{{ asset('storage/' . $registration->photo_ktp) }}', '{{ $registration->nama_lengkap }}')">
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->telepon }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->telepon_orangtua }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->akun_instagram }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->status }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->asal_sekolah_kampus }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->pekerjaan }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->bekerja_di }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->jenis_program }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->model_pembelajaran }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->program_studi }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->jam_pilihan }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->mulai_pendidikan }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->informasi }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->nama_ibu }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->nama_ayah }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->alat_transportasi }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->KIP }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                        {{ $registration->KPS }}</td>
                                    @if (Route::has('login'))
                                        @auth
                                            <td class="px-4 py-2 whitespace-nowrap overflow-auto">
                                                <div class="flex justify-center space-x-1">
                                                    <a href="{{ route('pendaftaran.edit', $registration->id) }}"
                                                        class="bg-blue-600 hover:bg-blue-800 p-2 rounded-md flex">
                                                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                        </svg>
                                                        <span class="capitalize text-white">edit</span>
                                                    </a>
                                                    <button
                                                        @click="open = true; courseRegistrationNama_lengkap = '{{ $registration->nama_lengkap }}'; deleteUrl = '{{ route('pendaftaran.destroy', $registration->id) }}';"
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
                                        @else
                                        @endauth
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-preview />

        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform scale-95 opacity-0"
            x-transition:enter-end="transform scale-100 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform scale-100 opacity-100"
            x-transition:leave-end="transform scale-95 opacity-0"
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h3 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus</h3>
                <p class="mt-2 text-gray-600">Apakah kamu yakin ingin menghapus <span
                        x-text="courseRegistrationNama_lengkap"></span> dari
                    data siswa?</p>
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

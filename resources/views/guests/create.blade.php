<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <body class="bg-gray-100">
        <div class="container mx-auto p-4 sm:p-6 lg:p-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-6">Data Tamu</h1>
            <form action="{{ route('guests.store') }}" method="POST">
                @csrf
                <x-success-message :message="session('success')" :formRecord="session('formrecord')" :dataLink="session('guests')" :dataText="session('data')" />
                <div
                    class="mb-4 bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                        required>
                </div>
                <div
                    class="mb-4 bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <label for="telepon" class="block text-gray-700 font-medium mb-2">Nomor telepon (Whatsapp)</label>
                    <div class="flex">
                        <select name="kode_negara" id="kode_negara"
                            class="px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                            <option value="+62">+62</option>
                        </select>

                        <input type="number" name="telepon" id="telepon" maxlength="17" value="{{ old('telepon') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                            required>
                    </div>

                    <script>
                        document.getElementById('form').addEventListener('submit', function(e) {
                            var kodeNegara = document.getElementById('kode_negara').value;
                            var nomorTelepon = document.getElementById('telepon').value;
                            var nomorTeleponLengkap = kodeNegara + nomorTelepon;
                            document.getElementById('nomor_telepon_lengkap').value = nomorTeleponLengkap;
                        });
                    </script>
                </div>

                <div
                    class="mb-4 bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <label for="status_pendidikan" class="block text-gray-700 font-medium mb-2">Status
                        pendidiikan</label>
                    <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                        @foreach (['Masih sekolah', 'Masih kuliah', 'Lulus sekolah', 'Lulus kuliah', 'Sudah bekerja', 'wirausaha'] as $index => $status_pendidikan)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="status_pendidikan" value="{{ $status_pendidikan }}"
                                    id="status_pendidikan{{ $index + 1 }}" class="mr-2"
                                    :checked="selectedRadio === '{{ $status_pendidikan }}'"
                                    @click="selectedRadio === '{{ $status_pendidikan }}' ? selectedRadio = null : selectedRadio = '{{ $status_pendidikan }}'">
                                <label for="status_pendidikan{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $status_pendidikan }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="mb-4 bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <label for="tujuan_motivasi_kursus" class="block text-gray-700 font-medium mb-2">Tujuan/Motivasi
                        kursus</label>
                    <div class="flex flex-col mb-2 ml-4">
                        @foreach (['Mendapatkan Sertifikat (Syarat melamar pekerjaan)', 'Mendapatkan Sertifikat (Keperluan Kampus)', 'Meningkatkan Skill/Keterampilan', 'Memperoleh Ilmu Baru (Pemula)', 'Disuruh Orang Tua (Keluarga)', 'Meningkatkan Peluang Karir', 'Mengisi Waktu Luang'] as $index => $tujuan_motivasi_kursus)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="tujuan_motivasi_kursus"
                                    value="{{ $tujuan_motivasi_kursus }}"
                                    id="tujuan_motivasi_kursus{{ $index + 1 }}" class="mr-2">
                                <label for="tujuan_motivasi_kursus{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $tujuan_motivasi_kursus }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center mb-2 ml-4">
                        <div class="flex items-center">
                            <input type="radio" name="tujuan_motivasi_kursus" value="Lainnya"
                                id="tujuan_motivasi_kursus_lainnya_radio" class="mr-2">
                            <label for="tujuan_motivasi_kursus_lainnya_radio" class="cursor-pointer">Lainnya</label>
                        </div>
                        <input type="text" id="tujuan_motivasi_kursus_lainnya" name="tujuan_motivasi_kursus_lainnya"
                            class="mt-4 sm:mt-0 sm:ml-4 border border-gray-300 p-1 rounded hidden"
                            placeholder="Tulis pilihan Anda">
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const radios = document.querySelectorAll('input[name="tujuan_motivasi_kursus"]');
                            const inputLainnya = document.getElementById('tujuan_motivasi_kursus_lainnya');
                            const form = document.querySelector('form');

                            let lastCheckedRadio = null;

                            radios.forEach(radio => {
                                radio.addEventListener('click', function() {
                                    if (lastCheckedRadio === this) {
                                        this.checked = false;
                                        lastCheckedRadio = null;
                                        if (this.value === 'Lainnya') {
                                            inputLainnya.classList.add('hidden');
                                        }
                                    } else {
                                        lastCheckedRadio = this;
                                        if (this.value === 'Lainnya') {
                                            inputLainnya.classList.remove('hidden');
                                            inputLainnya.focus();
                                        } else {
                                            inputLainnya.classList.add('hidden');
                                        }
                                    }
                                });
                            });

                            form.addEventListener('submit', function(event) {
                                const selectedRadio = document.querySelector(
                                    'input[name="tujuan_motivasi_kursus"]:checked');

                                if (selectedRadio && selectedRadio.value !== 'Lainnya') {
                                    inputLainnya.value = '';
                                }
                            });
                        });
                    </script>
                </div>
                <div
                    class="mb-4 bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <label for="kursus" class="block text-gray-700 font-medium mb-2">Kursus yang diminati</label>
                    <div class="flex flex-col mb-2 ml-4">
                        @foreach (['Desain grafis', 'Microsoft office', 'Administrasi perkantoran', 'Web design & programming', 'Teknik gambar design bangunan', 'Teknik / Management penjadwalan proyek', 'Perancangan struktur bangunan bertingkat', 'Sosial media marketing', 'Accurate marketing', 'Akuntansi'] as $index => $kursus)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="kursus" value="{{ $kursus }}"
                                    id="kursus{{ $index + 1 }}" class="mr-2">
                                <label for="kursus{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $kursus }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center mb-2 ml-4">
                        <div class="flex items-center">
                            <input type="radio" name="kursus" value="Lainnya" id="kursus_lainnya_radio"
                                class="mr-2">
                            <label for="kursus_lainnya_radio" class="cursor-pointer">Lainnya</label>
                        </div>
                        <input type="text" id="kursus_lainnya" name="kursus_lainnya"
                            class="mt-4 sm:mt-0 sm:ml-4 border border-gray-300 p-1 rounded hidden"
                            placeholder="Tulis pilihan Anda">
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const radios = document.querySelectorAll('input[name="kursus"]');
                            const inputLainnya = document.getElementById('kursus_lainnya');
                            const form = document.querySelector('form');

                            let lastCheckedRadio = null;

                            radios.forEach(radio => {
                                radio.addEventListener('click', function() {
                                    if (lastCheckedRadio === this) {
                                        this.checked = false;
                                        lastCheckedRadio = null;
                                        if (this.value === 'Lainnya') {
                                            inputLainnya.classList.add('hidden');
                                        }
                                    } else {
                                        lastCheckedRadio = this;
                                        if (this.value === 'Lainnya') {
                                            inputLainnya.classList.remove('hidden');
                                            inputLainnya.focus();
                                        } else {
                                            inputLainnya.classList.add('hidden');
                                        }
                                    }
                                });
                            });

                            form.addEventListener('submit', function(event) {
                                const selectedRadio = document.querySelector('input[name="kursus"]:checked');

                                if (selectedRadio && selectedRadio.value !== 'Lainnya') {
                                    inputLainnya.value = '';
                                }
                            });
                        });
                    </script>
                </div>

                <div
                    class="mb-4 bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <label for="tahu_alfabank_dari" class="block text-gray-700 font-medium mb-2">Tahu alfabank
                        dari?</label>
                    <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                        @foreach (['Teman', 'Brosur', 'Google', 'Website', 'Keluarga', 'TikTok', 'Youtube', 'Facebook', 'Instagram', 'Alumni Alfabank', 'Media Elektronik/Internet/Cetak'] as $index => $tahu_alfabank_dari)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="tahu_alfabank_dari" value="{{ $tahu_alfabank_dari }}"
                                    id="tahu_alfabank_dari{{ $index + 1 }}" class="mr-2"
                                    :checked="selectedRadio === '{{ $tahu_alfabank_dari }}'"
                                    @click="selectedRadio === '{{ $tahu_alfabank_dari }}' ? selectedRadio = null : selectedRadio = '{{ $tahu_alfabank_dari }}'">
                                <label for="tahu_alfabank_dari{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $tahu_alfabank_dari }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="mt-2 bg-blue-600 text-white px-4 py-2 mr-4 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition ease-in-out duration-300 capitalize ">submit</button>
                </div>
            </form>
        </div>
    </body>
</x-layout>

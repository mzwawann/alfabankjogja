<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('register-course.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-success-message :message="session('success')" :formRecord="session('formrecord')" :dataLink="session('siswa')" :dataText="session('data')" :dataLink1="session('formlink')"
            :dataText2="session('form')" />

        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-3 mb-5">
                {{ session('error') }}
            </div>
        @endif

        @error('telepon')
            <div class="text-red-800 bg-red-300 p-4 rounded-md mb-4">{{ $message }}</div>
        @enderror

        <x-preview />

        <div class="mb-6 p-12 bg-white rounded-lg">
            <h1 class="uppercase font-bold text-xl mb-4">ketentuan dan kebijakan kursus</h1>
            <h2>Dengan mengetahui dan mematuhi ketentuan ini, diharapkan Pelaksanaan kursus dapat berjalan Lancar,
                Efektif, Efisien dan Memberikan manfaat maksimal bagi Peserta dan Lembaga. </h2>

            <div class="p-4">
                <ul class="list-disc pl-4 space-y-2">
                    @foreach ($settings as $setting)
                        <li class="flex space-x-2">
                            <div class="flex items-center space-x-2 mt-2">
                                <a href="{{ asset('storage/' . $setting->file_path) }}" target="_blank"
                                    class="flex items-center text-blue-800 underline hover:text-red-800">
                                    <x-pdf-logo />{{ basename($setting->file_path) }}
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <label class="flex items-center mr-2 mt-2 cursor-pointer">
                <input class="mr-2 cursor-pointer" type="checkbox" name="ketentuan_dan_kebijakan"
                    id="ketentuan_dan_kebijakan" value="Menyetujui ketentuan dan kebijakan kursus" required>Saya
                setuju dan telah membaca, memahami dan
                menyetujui
                Ketentuan & Kebijakan
            </label>
        </div>

        <div class="mb-6 p-12 bg-white rounded-lg">
            <h1 class="uppercase font-bold text-xl mb-2">identitas pribadi</h1>
            <label for="" class="font-bold mr-1 block">Harap diisi dengan BENAR sesuai dengan ijazah terakhir
                dan lengkap termasuk gelar. </label>
            <label for="" class="block">Data ini digunakan untuk setiap SERTIFIKAT yang Anda peroleh.</label>

            <div class="mt-6 mb-4">
                <label for="nama_lengkap" class="block text-gray-700 font-medium mb-2 capitalize">nama lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="tempat_lahir" class="block text-gray-700 font-medium mb-2 capitalize">tempat lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 font-medium mb-2 capitalize">tanggal lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                    class="w-40 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700 font-medium mb-2">Jenis kelamin</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Laki-laki', 'Perempuan'] as $index => $jenis_kelamin)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="jenis_kelamin" value="{{ $jenis_kelamin }}" required
                                id="jenis_kelamin{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $jenis_kelamin }}'"
                                @click="selectedRadio === '{{ $jenis_kelamin }}' ? selectedRadio = null : selectedRadio = '{{ $jenis_kelamin }}'">
                            <label for="jenis_kelamin{{ $index + 1 }}"
                                class="cursor-pointer">{{ $jenis_kelamin }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="agama" class="block text-gray-700 font-medium mb-2">Agama</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Islam', 'Kristen', 'Khatolik', 'Hindu', 'Budha', 'Khonghucu'] as $index => $agama)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="agama" value="{{ $agama }}" required
                                id="agama{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $agama }}'"
                                @click="selectedRadio === '{{ $agama }}' ? selectedRadio = null : selectedRadio = '{{ $agama }}'">
                            <label for="agama{{ $index + 1 }}" class="cursor-pointer">{{ $agama }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="alamat_lengkap" class="block text-gray-700 font-medium mb-2 capitalize">Alamat
                    lengkap</label>
                <input type="text" name="alamat_lengkap" id="alamat_lengkap" value="{{ old('alamat_lengkap') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="" class="block text-gray-700 font-medium mb-2 capitalize">foto ktp</label>
                <input type="file" name="photo_ktp" id="photo_ktp"
                    class="w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    accept=".png, .jpg, .jpeg, .webp" required>
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-gray-700 font-medium mb-2">Nomor telepon (Whatsapp)</label>
                <div class="flex">
                    <select name="kode_negara" id="kode_negara"
                        class="px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                        <option value="+62">+62</option>
                    </select>

                    <input type="text" name="telepon" id="telepon" maxlength="17"
                        value="{{ old('telepon') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                        required>
                </div>

                <script>
                    document.getElementById('telepon').addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                        if (this.value.length > 14) {
                            this.value = this.value.slice(0, 14);
                        }
                    });
                    document.getElementById('form').addEventListener('submit', function(e) {
                        var kodeNegara = document.getElementById('kode_negara').value;
                        var nomorTelepon = document.getElementById('telepon').value;
                        var nomorTeleponLengkap = kodeNegara + nomorTelepon;
                        document.getElementById('nomor_telepon_lengkap').value = nomorTeleponLengkap;
                    });
                </script>
            </div>
            @error('telepon')
                <div class="text-red-800 mb-4">{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <label for="telepon_orangtua" class="block text-gray-700 font-medium mb-2 capitalize">nomor telepon
                    orang tua</label>
                <input type="text" name="telepon_orangtua" id="telepon_orangtua"
                    value="{{ old('telepon_orangtua') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
                <script>
                    document.getElementById('telepon_orangtua').addEventListener('input', function() {
                        this.value = this.value.replace(/[^0-9+]/g, '');

                        if (this.value.indexOf('+') > 0) {
                            this.value = this.value.replace(/\+/g, '');
                        }

                        if (this.value.length > 17) {
                            this.value = this.value.slice(0, 17);
                        }
                    });
                </script>
            </div>
            <div class="mb-4">
                <label for="akun_instagram" class="block text-gray-700 font-medium capitalize">akun instagram</label>
                <label for="akun_instagram" class="block text-gray-700 font-medium mb-2 capitalize">contoh: <span
                        class="font-bold">@alfabankjogja</span></label>
                <input type="text" name="akun_instagram" id="akun_instagram" value="{{ old('akun_instagram') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2 capitalize">status saat ini</label>
                <select name="status" id="status" class="border border-gray-300 rounded-lg p-2 capitalize"
                    required>
                    <option value="Masih sekolah">masih sekolah</option>
                    <option value="Lulus sekolah">lulus sekolah</option>
                    <option value="Masih kuliah">masih kuliah</option>
                    <option value="Lulus kuliah">lulus kuliah</option>
                    <option value="Bekerja">bekerja</option>
                    <option value="Wirausaha">wirausaha</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="asal_sekolah_kampus" class="block text-gray-700 font-medium mb-2 capitalize">asal
                    sekolah/kampus</label>
                <input type="text" name="asal_sekolah_kampus" id="asal_sekolah_kampus"
                    value="{{ old('asal_sekolah_kampus') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="pekerjaan" class="block text-gray-700 font-medium mb-2 capitalize">pekerjaan</label>
                <select name="pekerjaan" id="pekerjaan" class="border border-gray-300 rounded-lg p-2 capitalize"
                    required>
                    <option value="Pelajar">pelajar</option>
                    <option value="Mahasiswa">mahasiswa</option>
                    <option value="Belum bekerja">belum bekerja</option>
                    <option value="Karyawan swasta">karyawan swasta</option>
                    <option value="ASN">ASN</option>
                    <option value="TNI/POLRI">TNI/POLRI</option>
                    <option value="Wirausaha">wirausaha</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="bekerja_di" class="block text-gray-700 font-medium mb-2 capitalize">Bekerja di</label>
                <div class="flex flex-col mb-2">
                    <div class="ml-4 mt-2">
                        <input type="radio" name="bekerja_di" value="belum bekerja" id="belum_bekerja"
                            class="mr-2" required>
                        <label for="belum_bekerja" class="mr-4 cursor-pointer">Belum bekerja</label>
                    </div>

                    <div class="flex items-center mb-2 ml-4 mt-4">
                        <input type="radio" name="bekerja_di" value="lainnya" id="lainnya" class="mr-2"
                            required>
                        <input type="text" id="input_lainnya" name="input_lainnya"
                            class="ml-1 border border-gray-300 p-1 rounded flex-col" placeholder="Sebutkan..."
                            disabled>
                    </div>
                </div>

                <script>
                    document.querySelectorAll('input[type="radio"][name="bekerja_di"]').forEach((radio) => {
                        radio.addEventListener('click', function() {
                            if (this.value === 'lainnya') {
                                document.getElementById('input_lainnya').disabled = false;
                            } else {
                                document.getElementById('input_lainnya').disabled = true;
                                document.getElementById('input_lainnya').value = '';
                            }
                        });
                    });
                    const inputLainnya = document.getElementById('input_lainnya');
                    inputLainnya.addEventListener('focus', function() {
                        document.getElementById('lainnya').checked = true;
                        inputLainnya.disabled = false;
                    });
                </script>

            </div>

        </div>

        <div class="mb-6 p-12 bg-white rounded-lg">
            <h1 class="uppercase font-bold text-xl mb-4">program studi pilihan</h1>

            <div class="mb-4">
                <label for="jenis_program" class="block text-gray-700 font-medium mb-2 capitalize">jenis
                    program</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Reguler', 'Privat'] as $index => $jenis_program)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="jenis_program" value="{{ $jenis_program }}" required
                                id="jenis_program{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $jenis_program }}'"
                                @click="selectedRadio === '{{ $jenis_program }}' ? selectedRadio = null : selectedRadio = '{{ $jenis_program }}'">
                            <label for="jenis_program{{ $index + 1 }}"
                                class="cursor-pointer">{{ $jenis_program }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="model_pembelajaran" class="block text-gray-700 font-medium mb-2 capitalize">model
                    pembelajaran</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Online', 'Offline di alfabank'] as $index => $model_pembelajaran)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="model_pembelajaran" value="{{ $model_pembelajaran }}"
                                required id="model_pembelajaran{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $model_pembelajaran }}'"
                                @click="selectedRadio === '{{ $model_pembelajaran }}' ? selectedRadio = null : selectedRadio = '{{ $model_pembelajaran }}'">
                            <label for="model_pembelajaran{{ $index + 1 }}"
                                class="cursor-pointer">{{ $model_pembelajaran }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="program_studi" class="block text-gray-700 font-medium mb-2 capitalize">program
                    studi</label>
                <div class="flex flex-col mb-2 ml-4">
                    @foreach (['Desain grafis', 'Microsoft office', 'Administrasi perkantoran', 'Web design & programming', 'Teknik gambar design bangunan', 'Teknik/Management penjadwalan proyek', 'Perancangan struktur bangunan bertingkat', 'Sosial media marketing', 'Accurate marketing', 'Akuntansi'] as $index => $program_studi)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="program_studi" value="{{ $program_studi }}" required
                                id="program_studi{{ $index + 1 }}" class="mr-2">
                            <label for="program_studi{{ $index + 1 }}"
                                class="cursor-pointer">{{ $program_studi }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center mb-2 ml-4">
                    <div class="flex items-center">
                        <input type="radio" name="program_studi" value="Lainnya" id="program_studi_lainnya_radio"
                            class="mr-2">
                        <label for="program_studi_lainnya_radio" class="cursor-pointer">Lainnya</label>
                    </div>
                    <input type="text" id="program_studi_lainnya" name="program_studi_lainnya"
                        class="mt-4 sm:mt-0 sm:ml-4 border border-gray-300 p-1 rounded hidden"
                        placeholder="Tulis pilihan Anda">
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const radios = document.querySelectorAll('input[name="program_studi"]');
                        const inputLainnya = document.getElementById('program_studi_lainnya');
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
                            const selectedRadio = document.querySelector('input[name="program_studi"]:checked');

                            if (selectedRadio && selectedRadio.value !== 'Lainnya') {
                                inputLainnya.value = '';
                            }
                        });
                    });
                </script>
            </div>
            <div class="mb-4">
                <label for="jam_pilihan" class="block text-gray-700 font-medium mb-2 capitalize">jam pilihan</label>
                <input type="time" name="jam_pilihan" id="jam_pilihan" value="{{ old('jam_pilihan') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="mulai_pendidikan" class="block text-gray-700 font-medium mb-2 capitalize">mulai
                    pendidikan</label>
                <input type="date" name="mulai_pendidikan" id="mulai_pendidikan"
                    value="{{ old('mulai_pendidikan') }}"
                    class="w-40 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="informasi" class="block text-gray-700 text-lg capitalize">informasi dari</label>
                <label for="informasi" class="block text-gray-700 text-sm mb-2 capitalize">Tahu alfabank
                    dari?</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Teman', 'Brosur', 'Google', 'Website', 'Keluarga', 'TikTok', 'Youtube', 'Facebook', 'Instagram', 'Alumni Alfabank', 'Media Elektronik/Internet/Cetak'] as $index => $informasi)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="informasi" value="{{ $informasi }}" required
                                id="informasi{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $informasi }}'"
                                @click="selectedRadio === '{{ $informasi }}' ? selectedRadio = null : selectedRadio = '{{ $informasi }}'">
                            <label for="informasi{{ $index + 1 }}"
                                class="cursor-pointer">{{ $informasi }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mb-6 p-12 bg-white rounded-lg">
            <h1 class="uppercase font-bold text-xl mb-2">berkas dapodik</h1>
            <label for="" class="block">Mohon diisi dengan benar untuk keperluan input data pada dapodik
                (data pokok pendidik).</label>

            <div class="mt-6 mb-4">
                <label for="nama_ibu" class="block text-gray-700 font-medium mb-2 capitalize">nama ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="nama_ayah" class="block text-gray-700 font-medium mb-2 capitalize">nama ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="alat_transportasi" class="block text-gray-700 font-medium mb-2 capitalize">alat
                    transportasi</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Jalan kaki', 'Sepeda', 'Sepeda motor', 'Mobil', 'Transportasi umum'] as $index => $alat_transportasi)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="alat_transportasi" value="{{ $alat_transportasi }}" required
                                id="alat_transportasi{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $alat_transportasi }}'"
                                @click="selectedRadio === '{{ $alat_transportasi }}' ? selectedRadio = null : selectedRadio = '{{ $alat_transportasi }}'">
                            <label for="alat_transportasi{{ $index + 1 }}"
                                class="cursor-pointer">{{ $alat_transportasi }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="KIP" class="block text-gray-700 font-medium mb-2">Apakah Anda penerima KIP (Kartu
                    Indonesia Pintar)
                </label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Ya', 'Tidak'] as $index => $KIP)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="KIP" value="{{ $KIP }}" required
                                id="KIP{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $KIP }}'"
                                @click="selectedRadio === '{{ $KIP }}' ? selectedRadio = null : selectedRadio = '{{ $KIP }}'">
                            <label for="KIP{{ $index + 1 }}" class="cursor-pointer">{{ $KIP }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="KPS" class="block text-gray-700 font-medium mb-2">Apakah Anda penerima KPS (Kartu
                    Perlindungan Sosial)
                    *</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: null }">
                    @foreach (['Ya', 'Tidak'] as $index => $KPS)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="KPS" value="{{ $KPS }}" required
                                id="KPS{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $KPS }}'"
                                @click="selectedRadio === '{{ $KPS }}' ? selectedRadio = null : selectedRadio = '{{ $KPS }}'">
                            <label for="KPS{{ $index + 1 }}" class="cursor-pointer">{{ $KPS }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center items-center mt-12">
                <label for="" class="text-center">Pastikan anda sudah mengisi data dengan benar.</label>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-4 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('daftar') }}</button>
        </div>

    </form>
    <div class="mt-4 p-4 flex justify-center items-center">
        <label class="mr-1 text-center">Informasi lebih lanjut dapat ditanyakan
            melalui <a href="https://wa.me/6289671481943" target="tab"
                class="hover:text-blue-800 hover:underline transition duration-150 underline mr-1">Whatsapp.</a><label
                for="">|</label>
            <label for=""> Alfabank Yogyakarta,
                Jl. Glagahsari No. 46 C Warungboto Umbulharjo Yogyakarta</label>
    </div>
</x-layout>

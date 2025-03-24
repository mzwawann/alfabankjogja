<x-layout>
    <x-slot:title>{{ $title }}</x-slot> <x-preview />

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-6 capitalize">edit siswa</h1>
        <form action="{{ route('pendaftaran.update', $registration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6 p-12 bg-white rounded-lg">
                <h1 class="uppercase font-bold text-xl mb-2">Informasi siswa kursus</h1>
                <div class="mb-4 mt-2">
                    <label for="nomor_induk_siswa" class="block text-gray-700 font-medium mb-2">Nomor induk siswa</label>
                    <input type="text" name="nomor_induk_siswa" id="nomor_induk_siswa"
                        value="{{ $registration->nomor_induk_siswa }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                    @error('nomor_induk_siswa')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4 mt-2">
                    <label for="kode_kelas" class="block text-gray-700 font-medium mb-2">Kode kelas</label>
                    <input type="text" name="kode_kelas" id="kode_kelas" value="{{ $registration->kode_kelas }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
            </div>

            <div class="mb-6 p-12 bg-white rounded-lg">
                <h1 class="uppercase font-bold text-xl mb-2">identitas pribadi</h1>
                <div class="mb-4 mt-2">
                    <label for="nama_lengkap" class="block text-gray-700 font-medium mb-2">Nama</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                        value="{{ $registration->nama_lengkap }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                        required>
                </div>
                <div class="mb-4">
                    <label for="tempat_lahir" class="block text-gray-700 font-medium mb-2">Tempat lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        value="{{ $registration->tempat_lahir }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                        required>
                </div>
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700 font-medium mb-2">Tanggal lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        value="{{ $registration->tanggal_lahir }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-gray-700 font-medium mb-2">Jenis kelamin</label>
                    <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: '{{ old('jenis_kelamin', $registration->jenis_kelamin) }}' }">
                        @foreach (['Laki-laki', 'Perempuan'] as $index => $jenis_kelamin)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="jenis_kelamin" value="{{ $jenis_kelamin }}"
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
                    <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: '{{ old('agama', $registration->agama) }}' }">
                        @foreach (['Islam', 'Kristen', 'Khatolik', 'Hindu', 'Budha', 'Khonghucu'] as $index => $agama)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="agama" value="{{ $agama }}"
                                    id="agama{{ $index + 1 }}" class="mr-2"
                                    :checked="selectedRadio === '{{ $agama }}'"
                                    @click="selectedRadio === '{{ $agama }}' ? selectedRadio = null : selectedRadio = '{{ $agama }}'">
                                <label for="agama{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $agama }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <label for="alamat_lengkap" class="block text-gray-700 font-medium mb-2">alamat lengkap</label>
                    <input type="text" name="alamat_lengkap" id="alamat_lengkap"
                        value="{{ $registration->alamat_lengkap }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="photo_ktp" class="block text-gray-700 mb-2">Foto KTP</label>
                    <span>Current photo:
                        <a href="javascript:void(0);" class="hover:text-blue-800 underline"
                            onclick="showPreviewModal('{{ asset('storage/' . $registration->photo_ktp) }}', '{{ $registration->nama_lengkap }}')">
                            {{ $registration->nama_lengkap }}
                        </a>

                        <input type="file" name="photo_ktp" id="photo_ktp" accept=".png, .jpg, .jpeg, .webp"
                            class="w-full border-gray-300 rounded-md mt-2">
                        @error('photo_ktp')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-4">
                    <label for="telepon" class="block text-gray-700 font-medium mb-2">Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ $registration->telepon }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                    @error('telepon')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="telepon_orangtua" class="block text-gray-700 font-medium mb-2">Nomor telepon orang
                        tua</label>
                    <input type="text" name="telepon_orangtua" id="telepon_orangtua"
                        value="{{ $registration->telepon_orangtua }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="akun_instagram" class="block text-gray-700 font-medium mb-2">Akun instagram</label>
                    <input type="text" name="akun_instagram" id="akun_instagram"
                        value="{{ $registration->akun_instagram }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-medium mb-2">Status
                        pendidikan</label>
                    <input type="text" name="status" id="status" value="{{ $registration->status }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="asal_sekolah_kampus" class="block text-gray-700 font-medium mb-2">Asal sekolah atau
                        kampus</label>
                    <input type="text" name="asal_sekolah_kampus" id="asal_sekolah_kampus"
                        value="{{ $registration->asal_sekolah_kampus }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="pekerjaan" class="block text-gray-700 font-medium mb-2">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $registration->pekerjaan }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="bekerja_di" class="block text-gray-700 font-medium mb-2">Bekerja di</label>
                    <input type="text" name="bekerja_di" id="bekerja_di" value="{{ $registration->bekerja_di }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
            </div>

            <div class="mb-6 p-12 bg-white rounded-lg">
                <h1 class="uppercase font-bold text-xl mb-2">program studi pilihan</h1>
                <div class="mb-4">
                    <label for="jenis_program" class="block text-gray-700 font-medium mb-2">Jenis program</label>
                    <input type="text" name="jenis_program" id="jenis_program"
                        value="{{ $registration->jenis_program }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="model_pembelajaran" class="block text-gray-700 font-medium mb-2">Model
                        pembelajaran</label>
                    <input type="text" name="model_pembelajaran" id="model_pembelajaran"
                        value="{{ $registration->model_pembelajaran }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="program_studi" class="block text-gray-700 font-medium mb-2">Program studi</label>
                    <input type="text" name="program_studi" id="program_studi"
                        value="{{ $registration->program_studi }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="jam_pilihan" class="block text-gray-700 font-medium mb-2">Jam pilihan</label>
                    <input type="time" name="jam_pilihan" id="jam_pilihan"
                        value="{{ $registration->jam_pilihan }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="mulai_pendidikan" class="block text-gray-700 font-medium mb-2">Mulai
                        pendidikan</label>
                    <input type="date" name="mulai_pendidikan" id="mulai_pendidikan"
                        value="{{ $registration->mulai_pendidikan }}"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="informasi" class="block text-gray-700 font-medium mb-2">Tahu alfabank dari</label>
                    <input type="text" name="informasi" id="informasi" value="{{ $registration->informasi }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
            </div>

            <div class="mb-6 p-12 bg-white rounded-lg">
                <h1 class="uppercase font-bold text-xl mb-2">berkas dapodik</h1>
                <div class="mb-4">
                    <label for="nama_ibu" class="block text-gray-700 font-medium mb-2">Nama ibu</label>
                    <input type="text" name="nama_ibu" id="nama_ibu" value="{{ $registration->nama_ibu }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="nama_ayah" class="block text-gray-700 font-medium mb-2">Nama ayah</label>
                    <input type="text" name="nama_ayah" id="nama_ayah" value="{{ $registration->nama_ayah }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="alat_transportasi" class="block text-gray-700 font-medium mb-2">Alat
                        transportasi</label>
                    <input type="text" name="alat_transportasi" id="alat_transportasi"
                        value="{{ $registration->alat_transportasi }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
                </div>
                <div class="mb-4">
                    <label for="KIP" class="block text-gray-700 font-medium mb-2">Apakah Anda penerima KIP (Kartu
                        Indonesia Pintar)</label>
                    <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: '{{ old('KIP', $registration->KIP) }}' }">
                        @foreach (['Ya', 'Tidak'] as $index => $KIP)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="KIP" value="{{ $KIP }}"
                                    id="KIP{{ $index + 1 }}" class="mr-2"
                                    :checked="selectedRadio === '{{ $KIP }}'"
                                    @click="selectedRadio === '{{ $KIP }}' ? selectedRadio = null : selectedRadio = '{{ $KIP }}'">
                                <label for="KIP{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $KIP }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-4">
                    <label for="KPS" class="block text-gray-700 font-medium mb-2">Apakah Anda penerima KPS (Kartu
                        Perlindungan Sosial) *</label>
                    <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: '{{ old('KPS', $registration->KPS) }}' }">
                        @foreach (['Ya', 'Tidak'] as $index => $KPS)
                            <div class="flex items-center mb-2 mt-2">
                                <input type="radio" name="KPS" value="{{ $KPS }}"
                                    id="KPS{{ $index + 1 }}" class="mr-2"
                                    :checked="selectedRadio === '{{ $KPS }}'"
                                    @click="selectedRadio === '{{ $KPS }}' ? selectedRadio = null : selectedRadio = '{{ $KPS }}'">
                                <label for="KPS{{ $index + 1 }}"
                                    class="cursor-pointer">{{ $KPS }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <button type="submit"
                class="mt-4 bg-blue-600 text-white px-4 py-2 mr-4 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition ease-in-out duration-300 capitalize">submit</button>
            <a href="/siswa" class="underline capitalize hover:text-blue-800">kembali</a>
        </form>
    </div>
</x-layout>

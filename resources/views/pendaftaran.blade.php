<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="bg-white p-8 rounded-lg">
        <form action="" method="POST">

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-3 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-800 p-3 mb-5">
                    {{ session('error') }}
                </div>
            @endif

            <div>
                <x-input-label for="pendaftaran" :value="__('Nama')" />
                <x-text-input id="pendaftaran" class="block mt-1 w-full" type="text" name="pendaftaran" :value="old('pendaftaran')"
                    required autofocus autocomplete="pendaftaran" />

                <x-input-label for="Email" :value="__('Email')" class="mt-8" />
                <x-text-input id="Email" class="block mt-1 w-full" type="text" name="Email" :value="old('Email')"
                    required autofocus autocomplete="pendaftaran" />

                <x-input-label for="No.Telp" :value="__('No.Telp')" class="mt-8" />
                <x-text-input id="No.Telp" class="block mt-1 w-full" type="text" name="No.Telp" :value="old('No.Telp')"
                    required autofocus autocomplete="pendaftaran" />

                <x-input-label for="Tempat lahir" :value="__('Tempat Lahir')" class="mt-8" />
                <x-text-input id="Tempat lahir" class="block mt-1 w-full" type="text" name="Tempat lahir"
                    :value="old('Tempat Lahir')" required autofocus autocomplete="pendaftaran" />

                <x-input-label for="Tanggal lahir" :value="__('Tanggal Lahir')" class="mt-8" />
                <x-text-input id="Tanggal lahir" class="block mt-1 w-full" type="date" name="Tanggal lahir"
                    :value="old('Tanggal Lahir')" required autofocus autocomplete="pendaftaran" />

                <x-input-label for="Akun medsos" :value="__('Akun Medsos')" class="mt-8" />
                <x-text-input id="Akun medsos" class="block mt-1 w-full" type="text" name="Akun medsos"
                    :value="old('Akun medsos')" required autofocus autocomplete="pendaftaran" />

                <x-input-label for="gender" :value="__('Pilih gender')" class="mt-8" />
                <input type="radio" name="gender" value="L" id="gender_l" class="mr-2" required>
                <label for="gender_l" class="mr-4">Laki-laki</label>

                <input type="radio" name="gender" value="P" id="gender_p" class="mr-2" required>
                <label for="gender_p">Perempuan</label>


                <x-input-label for="program" :value="__('Pilih program')" class="mt-8" />
                <select name="program" class="w-full p-2 border border-gray-300" required>
                    <option value="administrasi perkantoran">Administrasi Perkantoran</option>
                    <option value="desain grafis">Desain Grafis</option>
                    <option value="microsoft office">Microsoft Office</option>
                    <option value="perancangan struktur bangunan bertingkat">Perancangan Struktur Bangunan Bertingkat
                    </option>
                    <option value="teknik gambar bangunan">Teknik Gambar Bangunan</option>
                </select>

                <x-input-label for="program" :value="__('Status saat ini')" class="mt-8" />
                <select name="program" class="w-full p-2 border border-gray-300" required>
                    <option value="Masih sekolah">Masih sekolah</option>
                    <option value="Lulus sekolah">Lulus sekolah</option>
                    <option value="Masih kuliah">Masih kuliah</option>
                    <option value="Lulus kuliah">Lulus kuliah
                    </option>
                    <option value="Bekerja">Bekerja</option>
                    <option value="Wirausaha">Wirausaha</option>
                </select>

                <x-input-label for="Asal sekolah/kampus" :value="__('Asal Sekolah/Kampus')" class="mt-8" />
                <x-text-input id="Asal sekolah/kampus" class="block mt-1 w-full" type="text"
                    name="Asal sekolah/medsos" :value="old('Asal Sekolah/Kampus')" required autofocus autocomplete="pendaftaran" />

                <x-input-label for="Bekerja di" :value="__('Bekerja Di')" class="mt-8" />
                <x-text-input id="Bekerja di" class="block mt-1 w-full" type="text" name="Bekerja di"
                    :value="old('Bekerja Di')" required autofocus autocomplete="pendaftaran" />

                <x-input-label for="ktp_photo" :value="__('Upload photo ktp')" class="mt-8" />
                <input type="file" name="ktp_photo" accept="image/*" class="w-full p-2 border border-gray-300"
                    required>

                <div class="flex justify-end">
                    <a href="{{ url('/') }}">
                        <button type="submit" class="p-2 mt-8 rounded-md text-white bg-customGreen">DAFTAR</button>
                    </a>
                </div>

            </div>
        </form>
    </div>
</x-layout>

<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-6">Edit Guest</h1>
        <form action="{{ route('guests.update', $guest->id) }}" method="POST"
            class="bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="name" id="name" value="{{ $guest->name }}"     
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-gray-700 font-medium mb-2">Nomor telepon</label>
                <input type="text" name="telepon" id="telepon" value="{{ $guest->telepon }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                    required>
                @error('telepon')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="kursus" class="block text-gray-700 font-medium mb-2">Kursus yang diminati</label>
                <input type="text" name="kursus" id="kursus" value="{{ $guest->kursus }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
            </div>
            <div class="mb-4">
                <label for="status_pendidikan" class="block text-gray-700 font-medium mb-2">Status pendidikan</label>
                <input type="text" name="status_pendidikan" id="status_pendidikan"
                    value="{{ $guest->status_pendidikan }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
            </div>
            <div class="mb-4">
                <label for="tahu_alfabank_dari" class="block text-gray-700 font-medium mb-2">Tahu alfabank dari?</label>
                <input type="text" name="tahu_alfabank_dari" id="tahu_alfabank_dari"
                    value="{{ $guest->tahu_alfabank_dari }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
            </div>
            <div class="mb-4">
                <label for="tujuan_motivasi_kursus" class="block text-gray-700 font-medium mb-2">Tujuan/Motivasi
                    kursus</label>
                <input type="text" name="tujuan_motivasi_kursus" id="tujuan_motivasi_kursus"
                    value="{{ $guest->tujuan_motivasi_kursus }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                <div class="flex flex-col mb-2 ml-4" x-data="{ selectedRadio: '{{ old('status', $guest->status) }}' }">
                    @foreach (['Info', 'Her'] as $index => $status)
                        <div class="flex items-center mb-2 mt-2">
                            <input type="radio" name="status" value="{{ $status }}"
                                id="status{{ $index + 1 }}" class="mr-2"
                                :checked="selectedRadio === '{{ $status }}'"
                                @click="selectedRadio === '{{ $status }}' ? selectedRadio = null : selectedRadio = '{{ $status }}'">
                            <label for="status{{ $index + 1 }}" class="cursor-pointer">{{ $status }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-4">
                <label for="FU" class="block text-gray-700 font-medium mb-2">FU</label>
                <input type="text" name="FU" id="FU" value="{{ $guest->FU }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200">
            </div>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 mr-4 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition ease-in-out duration-300 capitalize">submit</button>
            <a href="/guestsbook">Kembali</a>
        </form>
    </div>
</x-layout>

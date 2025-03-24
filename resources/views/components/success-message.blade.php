@if ($message)
    <div id="success-message"
        class="mb-4 mt-8 p-4 h-auto bg-white border-t-8 border-green-500 rounded-lg flex transition-opacity duration-500 ease-in-out">
        <div class="pl-4 pt-4 mb-6">
            <h1 class="uppercase text-4xl mb-4">{{ $message }}</h1>
            @if ($formRecord)
                <span class="text-gray-500">{{ $formRecord }}</span>
            @endif
            @if (Route::has('login'))
                @auth
                    @if ($dataLink && $dataText)
                        <div class="mt-4">
                            <a href="{{ $dataLink }}"
                                class="underline hover:cursor-pointer text-purple-800">{{ $dataText }}</a>
                        </div>
                        <div>
                            <a href="{{ $dataLink1 }}"
                                class="underline hover:cursor-pointer text-purple-800">{{ $dataText2 }}</a>
                        </div>
                    @endif
                @else
                    <div class="mt-4">
                        <a href="{{ $dataLink1 }}"
                            class="underline hover:cursor-pointer text-purple-800">{{ $dataText2 }}</a>
                    </div>
                @endauth
            @endif
        </div>
    </div>
    <div class="flex space-x-2 capitalize mb-8 justify-end underline text-gray-700 text-sm mr-2">
        <a href="/contact" target="tab">hubungi kami</a>
        <a href="/about" target="tab">tentang kami</a>
        <a href="https://alfabankjogja.com/profile-alfabank/" target="tab">profile</a>
        <a href="https://alfabankjogja.com/kursus-komputer-dan-program-profesi-alfabank-yogyakarta/tentang-alfabank-yogyakarta/visi-dan-misi/"
            target="tab">visi
            & misi</a>
    </div>
@endif

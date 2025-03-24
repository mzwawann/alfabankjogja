<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="max-w-4xl mx-auto p-8 bg-gray-50 shadow-md rounded-xl">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-6">Tentang Kami</h1>
        <p class="text-lg text-gray-700 mb-8">{{ $nama }}</p>

        <h2 class="text-4xl font-semibold text-gray-800 mb-6">Kursus Online Kami</h2>
        <p class="text-gray-600 mb-8">Kami menyediakan berbagai kursus online untuk meningkatkan keterampilan dan
            pengetahuan Anda. Pilih dari kursus unggulan kami berikut:</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <a href="#"
                class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300 ease-in-out">
                <img src="https://alfabankjogja.com/wp-content/uploads/2024/02/Kursus-Administrasi-Perkantoran-2024.jpg"
                    alt="" class="mb-4">
                <h3 class="text-2xl font-semibold text-gray-900">Administrasi perkantoran</h3>
                {{-- <p class="text-gray-700 mt-2">Kursus Administrasi Perkantoran adalah kelas yang mempelajari tentang administrasi perusahaan, pengelolaan surat menyurat, hingga pengelolaan keuangan. </p> --}}
            </a>
            <a href="#"
                class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300 ease-in-out">
                <img src="https://alfabankjogja.com/wp-content/uploads/2024/02/Kursus-Desain-Grafis-Merchandise.jpg"
                    alt="" class="mb-4">
                <h3 class="text-2xl font-semibold text-gray-900">Desain grafis merchandise</h3>
                {{-- <p class="text-gray-700 mt-2">Ikuti pelatihan desain grafis di Alfabank Jogja. Desain grafis mempunyai peranan yang cukup besar bagi kebutuhan industri saat ini. Peralihan menjadi digital merupakan salah satu penyebabnya. Seolah-olah desain grafis merupakan skil yang paling dibutuhkan saat ini</p> --}}
            </a>
            <a href="#"
                class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300 ease-in-out">
                <img src="https://alfabankjogja.com/wp-content/uploads/2023/10/Kursus-Microsoft-Office-1024x1024.jpg"
                    alt="" class="mb-4">
                <h3 class="text-2xl font-semibold text-gray-900">Microsoft Office</h3>
                {{-- <p class="text-gray-700 mt-2">Kuasi Word, Excel, PowerPoint, dan lainnya dengan mudah.</p> --}}
            </a>
            <a href="#"
                class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300 ease-in-out">
                <img src="https://alfabankjogja.com/wp-content/uploads/2024/02/Kursus-Perancangan-Struktur-Bangunan-Bertingkat.jpg"
                    alt="" class="mb-4">
                <h3 class="text-2xl font-semibold text-gray-900">Perancangan struktur bangunan bertingkat</h3>
                {{-- <p class="text-gray-700 mt-2">alam era digital seperti sekarang, perhitungan analisa struktur semakin mudah dengan pemanfaatan program SAP2000. Sebagai salah satu program rekayasa mekanika yang paling populer dan banyak digunakan di seluruh dunia, SAP2000, yang dikembangkan oleh Berkeley University melalui produk CSI, memberikan kemudahan dalam perencanaan dan analisis struktur gedung atau bangunan. Untuk menguasai program ini, Anda dapat mengikuti kursus SAP2000 Bersertifikat yang diselenggarakan oleh Alfabank Jogja. </p> --}}
            </a>
            <a href="#"
                class="block bg-white p-6 rounded-lg shadow-lg hover:bg-gray-50 transition duration-300 ease-in-out">
                <img src="https://alfabankjogja.com/wp-content/uploads/2024/02/Kursus-Teknik-Gambar-Desain-Bangunan.jpg"
                    alt="" class="mb-4">
                <h3 class="text-2xl font-semibold text-gray-900">Teknik Gambar Desain Bangunan</h3>
                {{-- <p class="text-gray-700 mt-2">Di era digital seperti sekarang, proses pembuatan gambar teknik telah beralih dari manual ke komputer, dengan menggunakan CAD Computer Aided Design. Salah satu program CAD yang paling populer dan banyak digunakan di seluruh dunia, dengan fitur drafting yang komprehensif, adalah AutoCAD yang dikembangkan oleh Autodesk.</p> --}}
            </a>
        </div>

        <p class="text-gray-600 mb-8">Kursus kami dirancang oleh para ahli dan disajikan dalam format video, bacaan, dan
            tugas interaktif. Belajar dengan kecepatan Anda sendiri dan raih sertifikat setelah menyelesaikan kursus.
        </p>

        <h2 class="text-4xl font-semibold text-gray-800 mb-6">Keunggulan Kami</h2>
        <ul class="list-disc list-inside text-gray-600 mb-8">
            <li>Kursus oleh para ahli dengan pengalaman industri.</li>
            <li>Materi yang selalu terupdate.</li>
            <li>Dukungan penuh dari instruktur dan tim teknis.</li>
            <li>Forum diskusi yang aktif.</li>
            <li>Portofolio proyek nyata untuk praktik.</li>
        </ul>

        <h2 class="text-4xl font-semibold text-gray-800 mb-6">Ulasan</h2>
        <div class="space-y-6 mb-8">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700">"Kursus ini sangat membantu saya memahami dasar-dasar pengembangan web. Kini
                    saya lebih percaya diri membuat situs web sendiri."</p>
                <p class="text-gray-600 text-sm mt-2">- Budi</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <p class="text-gray-700">"Materi disajikan dengan jelas dan mudah diikuti. Saya sangat merekomendasikan
                    kursus ini untuk siapa saja yang ingin belajar desain grafis."</p>
                <p class="text-gray-600 text-sm mt-2">- Anggi</p>
            </div>
        </div>

        <p class="text-gray-700">Bergabunglah dengan kami dan mulailah perjalanan Anda untuk menguasai keterampilan
            baru!</p>
    </div>
</x-layout>

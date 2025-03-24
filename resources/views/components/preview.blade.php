<div id="previewModal" onclick="handleModalClick(event)"
    class="fixed inset-0 p-4 hidden items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="relative w-full max-w-4xl rounded-md overflow-auto max-h-screen">
        <div class="flex justify-between items-center mb-2">
            <div class="flex">
                <span id="previewNamaLengkap" class="text-white font-medium capitalize mr-4 mt-2"></span>
                <a id="downloadLink" href="#" download class="py-2 rounded flex mr-1">
                    <svg class="w-6 h-6 text-gray-100 dark:text-white mr-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                    </svg>
                </a>
                <button onclick="zoomOut()" class="mr-1">
                    <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M7 10h6m4 0a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
                <button onclick="zoomIn()">
                    <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M10 7v6m-3-3h6m4 0a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>
            <button class="text-right text-4xl text-gray-100" onclick="closePreviewModal()">&times;</button>
        </div>

        <div class="overflow-auto max-h-[80vh] rounded-md">
            <img id="previewImage" class="object-contain w-full h-auto transform transition-transform duration-300"
                src="">
        </div>
    </div>
</div>

<script>
    let scale = 1;
    const previewImage = document.getElementById('previewImage');

    function zoomIn() {
        scale += 0.1;
        previewImage.style.transform = `scale(${scale})`;
    }

    function zoomOut() {
        if (scale > 1) {
            scale -= 0.1;
            previewImage.style.transform = `scale(${scale})`;
        }
    }

    function resetZoom() {
        scale = 1;
        previewImage.style.transform = `scale(${scale})`;
    }

    function showPreviewModal(imageSrc, namaLengkap) {
        const modal = document.getElementById('previewModal');
        const image = document.getElementById('previewImage');
        const downloadLink = document.getElementById('downloadLink');
        const namaLengkapElement = document.getElementById('previewNamaLengkap');

        image.src = imageSrc;
        downloadLink.href = imageSrc;

        namaLengkapElement.textContent = namaLengkap;

        // Show modal: Remove 'hidden' and add 'flex'
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closePreviewModal() {
        const modal = document.getElementById('previewModal');

        modal.classList.add('hidden');
        modal.classList.remove('flex');

        resetZoom();
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            setTimeout(closePreviewModal, 100); //delay 100ms
        }
    });

    function handleModalClick(event) {
        const modalContent = document.querySelector('#previewModal > div');
        if (!modalContent.contains(event.target)) {
            setTimeout(closePreviewModal, 100); //delay 100ms
        }
    }
</script>

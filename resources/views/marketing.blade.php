<x-layout>
    <x-slot:title>{{ __('Marketing') }}</x-slot>

    <div class="chart-container"
        style="display: flex; flex-wrap: wrap; justify-content: space-between; height: 100vh; padding-bottom: 50px;">
        <div style="width: 48%; height: 45%;">
            <canvas id="marketingChart"></canvas>
        </div>
        <div style="width: 48%; height: 45%;">
            <canvas id="omsetChart"></canvas>
        </div>
        <div style="width: 48%; height: 45%;">
            <canvas id="informanChart"></canvas>
        </div>
        <div style="width: 48%; height: 45%;">
            <canvas id="kelasBerjalanChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi dan fungsi chart...
        });
    </script>
</x-layout>

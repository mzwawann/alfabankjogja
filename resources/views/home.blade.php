<x-layout>
    <x-slot:title>{{ __('home') }}</x-slot>

    <div class="chart-container" style="position: relative; height: 60vh; width: 100%;">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var dataPoints = @json($data);

            // Check if dataPoints is correctly formatted
            console.log(dataPoints);

            var labels = dataPoints.map(point => point.label);
            var dataValues = dataPoints.map(point => point.y);

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Data Bulanan',
                        data: dataValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.4
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Function to fetch new data and update the chart
            const fetchDataAndUpdateChart = () => {
                fetch('/home')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Fetched data:', data);
                        const newLabels = data.labels;
                        const newValues = data.values;

                        myChart.data.labels = newLabels;
                        myChart.data.datasets[0].data = newValues;
                        myChart.update();
                    })
                    .catch(error => console.error('Error fetching data:', error));
            };

            // Refresh data every 2 seconds
            setInterval(fetchDataAndUpdateChart, 2000);
        });
    </script>
</x-layout>
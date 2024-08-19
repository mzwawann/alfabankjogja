document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('myChart').getContext('2d');

    // Fungsi untuk mendapatkan data dari endpoint
    function fetchData() {
        fetch('/chart/data')
            .then(response => response.json())
            .then(data => {
                var labels = data.labels;
                var values = data.values;

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Data Bulanan',
                            data: values,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
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
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Panggil fungsi fetchData untuk mendapatkan data dan membuat grafik
    fetchData();

    // Untuk pembaruan data setiap 2 detik
    setInterval(fetchData, 2000);
});

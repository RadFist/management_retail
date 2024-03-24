<?php 
$data = [450, 200, 300, 250, 150, 350];
?>

<script>
const selectElement = document.getElementById('chart_select');
let labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
const data = <?php echo json_encode($data); ?>; // Mengambil data dari PHP dan menyimpannya ke dalam variabel JavaScript

// Mendefinisikan grafik
var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels, // Menggunakan label kosong untuk memulai
        datasets: [{
            label: 'penjualan',
            data: data, // Menggunakan data yang diambil dari PHP
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

selectElement.addEventListener('change', function() {
    // Mendapatkan nilai (value) yang dipilih
    var selectedValue = selectElement.value;

    if (selectedValue === "Tahun") {
        labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
    } else if (selectedValue === "Bulan") {
        labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4']; // Atur label untuk bulan sesuai kebutuhan
    } else if (selectedValue === "Minggu") {
        labels = ['Hari 1', 'Hari 2', 'Hari 3', 'Hari 4', 'Hari 5', 'Hari 6', 'Hari 7']; // Atur label untuk minggu sesuai kebutuhan
    }

    myChart.data.labels = labels;
    // ganti data
    // myChart.data.datasets[0].data  = [2,2,2,2,2,2]
    myChart.update();

});
</script>

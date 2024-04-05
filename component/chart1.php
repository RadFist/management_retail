<?php 
function arr($sql){
    $result = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }
    return $result;
}

$query_tahun = "SELECT DATE_FORMAT(tanggal, '%Y-%m') AS bulan,LEFT(MONTHNAME(tanggal), 3) AS nama_bulan, SUM(terjual*harga) AS pendapatan
FROM tb_rekap_penjualan
WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 1 YEAR)
GROUP BY bulan
ORDER BY bulan ASC";

$query_minggu="SELECT DATE_FORMAT(tanggal, '%Y-%m-%d') AS bulan,
SUM(terjual * harga) AS pendapatan
FROM tb_rekap_penjualan
WHERE WEEK(tanggal) = WEEK(NOW())
GROUP BY bulan;";

$sql_tahun = mysqli_query($connect,$query_tahun);
$sql_minggu = mysqli_query($connect,$query_minggu);

$result_tahun = arr($sql_tahun);
$result_minggu = arr($sql_minggu);


$data_tahun = array_column($result_tahun, 'pendapatan');
$label_tahun = array_column($result_tahun, 'nama_bulan');   

$data_minggu = array_column($result_minggu, 'pendapatan');
$label_minggu = array_column($result_minggu, 'bulan');   


?>

<script>
const selectElement = document.getElementById('chart_select');
let labels =<?php echo json_encode($label_tahun); ?>;
let data = <?php echo json_encode($data_tahun); ?>; // Mengambil data dari PHP dan menyimpannya ke dalam variabel JavaScript

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
        labels =<?php echo json_encode($label_tahun); ?>;
        data  = <?php echo json_encode($data_tahun); ?>;
    } else if (selectedValue === "Bulan") {
        labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4']; // Atur label untuk bulan sesuai kebutuhan
    } else if (selectedValue === "Minggu") {
        labels =<?php echo json_encode($label_minggu); ?>;
        data  = <?php echo json_encode($data_minggu); ?>;
      }

    myChart.data.labels = labels;
    // ganti data
    myChart.data.datasets[0].data  = data;
    myChart.update();

});
</script>

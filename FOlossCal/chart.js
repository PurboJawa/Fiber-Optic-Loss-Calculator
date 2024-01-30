document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('grafik').getContext('2d');
    var dataPoints = [];
    var chart;
    var nomorCounter = 1; 
    var jumlahPerhitungan; 

    // Mendapatkan nilai jumlah_perhitungan dari URL query parameter
    var urlParams = new URLSearchParams(window.location.search);
    jumlahPerhitungan = parseInt(urlParams.get('calculation_limit')) || 0;

    // Memeriksa apakah input jumlah_perhitungan sudah diisi
    var isJumlahPerhitunganSet = false;

    // Inisialiasi var chart kosong buat tampilan saja
    chart = createChart();

    function createChart() {
        return new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    fontStyle: "bold",
                    label: 'Redaman Fiber Optik',
                    borderColor: 'green', // Set warna border transparan
                pointBorderColor: 'red', // Set warna titik sesuai keinginan
                pointBackgroundColor: 'red',
                    data: [],
                    fill: false
                }]
            },
            options: {
                scales: {
                  
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        title: {
                            display: true,
                            text: 'Panjang Kabel (km)',
                            font: {
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Redaman (dB)',
                            font: {
                                weight: 'bold'
                            }
                        },
                        ticks: {
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
            }
        });
    }


    function updateChart(data) {
        
        dataPoints.push({ x: data.panjang_kabel, y: data.redaman });

        // buat Update chart
        chart.data.datasets[0].data = dataPoints;
        chart.update();

    }

    function resetChart() {
        dataPoints = [];

        // buat update chart saat klik tombol reset
        chart.data.datasets[0].data = dataPoints;
        chart.update();
        nomorCounter = 1;
        resetGraphConclusion();
        isJumlahPerhitunganSet = false;
        document.getElementById('jumlah_perhitungan').disabled = false;
      
    }

    function updateTable(data) {
        var tableBody = document.getElementById('resultTableBody');
        var row = '<tr><td>' + nomorCounter++ + '</td><td>' + data.panjang_kabel + '</td><td>' + data.koefisien_redaman + '</td><td>' + data.redaman + '</td></tr>';
        tableBody.innerHTML += row;
    }

    function showGraphConclusion() {
        var graphConclusionDiv = document.getElementById('graphConclusion');

       
        if (dataPoints.length < 2) {
            graphConclusionDiv.innerHTML = "<p>Minimal dua data diperlukan untuk menarik kesimpulan dari grafik.</p>";
        } else {
            var xValues = dataPoints.map(function(data) { return data.x; });
            var yValues = dataPoints.map(function(data) { return data.y; });

            
            var conclusion;
            if (yValues.every(function(y) { return y >= yValues[0]; })) {
                conclusion = "Kesimpulan: Ada peningkatan redaman. Peningkatan rata-rata redaman adalah " + calculateMeanDifference(yValues).toFixed(3) + " dB/km.";
            } else if (yValues.every(function(y) { return y <= yValues[0]; })) {
                conclusion = "Kesimpulan: Tidak ada peningkatan redaman. Rata-rata redaman adalah " + calculateMeanDifference(yValues).toFixed(3) + " dB/km.";
            } else {
                conclusion = "Kesimpulan: Terdapat variasi redaman dengan penambahan panjang kabel. Variasi rata-rata adalah " + calculateMeanDifference(yValues).toFixed(3) + " dB/km.";
            }

            // Menampilkan kesimpulan di bawah tabel
            graphConclusionDiv.innerHTML = "<p>" + conclusion + "</p>";
        }
    }

    function calculateMeanDifference(array) {
        var differences = [];
        for (var i = 1; i < array.length; i++) {
            differences.push(array[i] - array[i - 1]);
        }
        return differences.reduce(function(sum, value) { return sum + value; }, 0) / differences.length;
    }


    function resetGraphConclusion() {
        var graphConclusionDiv = document.getElementById('graphConclusion');
        graphConclusionDiv.innerHTML = ''; // Mereset konten kesimpulan grafik
    }

    function disableRadios() {
        var radios = document.querySelectorAll('input[name="koefisien_redaman"]');
        radios.forEach(function(radio) {
            radio.disabled = true;
        });
    }

    function enableRadios() {
        var radios = document.querySelectorAll('input[name="koefisien_redaman"]');
        radios.forEach(function(radio) {
            radio.disabled = false;
        });
    }

    function resetRadios() {
        var radios = document.querySelectorAll('input[name="koefisien_redaman"]');
        radios.forEach(function(radio) {
            radio.checked = false;
            radio.removeAttribute('disabled');
        });
    }

    function showTable() {
        var table = document.getElementById('resultTable');
        table.style.display = 'table'; // Show the table
    }

    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();
    
        var jumlah_perhitungan = parseInt(document.getElementById('jumlah_perhitungan').value);

        if (!isJumlahPerhitunganSet) {
            // Jika belum diisi, set nilai dan blokir input
            jumlahPerhitungan = parseInt(document.getElementById('jumlah_perhitungan').value);
            isJumlahPerhitunganSet = true;
            document.getElementById('jumlah_perhitungan').disabled = true;
        }
        // Cek apakah perhitungan melebihi inputtan jumlah_perhitungan
        if (nomorCounter > jumlah_perhitungan) {
            alert('Anda telah mencapai batas jumlah perhitungan dalam satu waktu, silahkan reset diagram dan ubah jumlah perhitungan yang anda inginkan');
            
            // fitur reset otomatis
            // alert('Batas perhitungan telah melebihi yang seharusnya. Program akan di-reset secara otomatis');
            // resetChart();
            // resetRadios();
            // resetGraphConclusion();
            // document.getElementById('resultTableBody').innerHTML = '';
            // nomorCounter = 1;
            // isJumlahPerhitunganSet = false;
            // document.getElementById('jumlah_perhitungan').disabled = false;

            return;
        }

        if (nomorCounter == jumlah_perhitungan) {
            alert('Peringatan: Anda sudah mencapai batas jumlah perhitungan. Silahkan reset ');
        }
    
        var panjang_kabel = parseFloat(document.getElementById('panjang_kabel').value);
        var koefisien_redaman = parseFloat(document.querySelector('input[name="koefisien_redaman"]:checked').value);
    
        fetch('calculate.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'panjang_kabel=' + panjang_kabel + '&koefisien_redaman=' + koefisien_redaman
        })
            .then(response => response.json())
            .then(data => {
                updateChart(data);
                updateTable(data);
                showGraphConclusion();
                showTable();
            });
    });


    document.querySelector('button[onclick="resetDiagram()"]').addEventListener('click', function () {
        resetChart();
        // Reset tabel saat reset chart juga
        document.getElementById('resultTableBody').innerHTML = '';
    });
});

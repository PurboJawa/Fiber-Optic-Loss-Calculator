<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="calculation-limit" content="<?php echo $calculationLimit; ?>">
    <title>Kalkulator Redaman Fiber Optik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
</head>
<body class="page2body">
    <div class="menu-container">
        <div class="menu-item non" onclick="goToHome()">Home</div>
        <div class="men-item home" onclick="goToCalculator()">Kalkulator</div>
        <div class="menu-item non" onclick="goToPanduan()">Panduan Pengguna</div>
    </div>
    <div class="container page2-container">
        <?php
            $calculationLimit = isset($_GET['calculation_limit']) ? intval($_GET['calculation_limit']) : 0;
        ?>
        <h1 style="text-align:center;">Kalkulator Redaman Fiber Optik</h1>
        <br>
        <form action="calculate.php" method="post">
            <label for="jumlah_perhitungan">Jumlah Perhitungan:</label><br>
            <input type="number" name="jumlah_perhitungan" id="jumlah_perhitungan" style="width:100%;" required><br><br>
            <label for="panjang_kabel" >Panjang Kabel (km):</label><br>
            <input type="number" name="panjang_kabel" id="panjang_kabel" required step="0.01" style="width:100%;"><br><br>
            <label>Koefisien Redaman:</label><br>
            <label for="redaman_022"><input type="radio" name="koefisien_redaman" value="0.22" id="redaman_022" required onclick="disableRadios()"> 0.22 dB/km</label><br>
            <label for="redaman_035"><input type="radio" name="koefisien_redaman" value="0.35" id="redaman_035" required onclick="disableRadios()"> 0.35 dB/km</label><br>
            <div class="text-center button-container">
               <button type="submit">Hitung</button>
                <button type="button" onclick="resetDiagram()">Reset</button>
            </div>
            <br>
            <br>
        </form>
        <div class="grafik-container">
            <b><canvas id="grafik" width="500" height="220" ></canvas></b>
        </div>
        <div id="graphConclusion"></div>
        <br>
        <table class="table" id="resultTable" style="display:none;">
            <thead class="thead" style="background: crimson;">
                <tr style="color: white;">
                    <th scope="col">Nomor</th>
                    <th scope="col">Panjang Kabel (km)</th>
                    <th scope="col">Koefisien Redaman</th>
                    <th scope="col">Redaman (dB)</th>
                </tr>
            </thead>
            <tbody id="resultTableBody"></tbody>
        </table>
        <br>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
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

        function resetDiagram() {
            resetRadios();
        }

        // balik ke halaman pertama
        function goToHome() {
            window.location.href = 'home.php';
        }

        function goToPanduan() {
            window.location.href = 'page1.php';
        }

        function goToCalculator() {
            window.location.href = 'page2.php';
        }

        document.querySelector('button[onclick="resetDiagram()"]').addEventListener('click', resetDiagram);
    </script>
</body>
</html>

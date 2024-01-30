<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Pengguna</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
</head>
<body class="page1body">
<div class="menu-container">
        <div class="menu-item non" onclick="goToHome()">Home</div>
        <div class="menu-item non" onclick="goToCalculator()">Kalkulator</div>
        <div class="men-item home" onclick="goToPanduan()">Panduan Pengguna</div>
    </div>
    <div class="container page1-container">
        <h1 style="text-align:center;">Panduan Pengguna</h1>
        <p>1. Masukkan berapa kali perhitungan yang ingin anda lakukan.</p>
        <p>2. Masukkan panjang kabel dalam satuan kilometer.</p>
        <p>3. Pilih koefisien redaman kabel.</p>
        <p>4. Klik tombol 'Hitung' untuk menghitung dan menampilkan redaman.</p>
        <p>5. Untuk mereset diagram, klik tombol 'Reset Diagram'.</p>
        <p>6. Pastikan panjang kabel tidak kurang dari nilai terakhir.</p>
    </div>
    
    
</body>
<script src="chart.js"></script>
<script>
   function goToHome() {

        window.location.href = 'home.php';
        
    }

    function goToPanduan() {
        window.location.href = 'page1.php';
    }

    function goToCalculator() {
        window.location.href = 'page2.php';
    }
</script>

<style>
    body {
        height: 100%;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    .page1-container p {
        margin: 0;
    }

    .page1body {
        background: linear-gradient(60deg, #ff5656 50%, #e27d7d 50%);
    }

    .container {
        max-width: 600px;
        margin: 55px auto;
        background-color: rgba(235, 228, 228, 0.658);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        min-height: 100vh;
    }

    .page1-container {
        background-color: rgba(243, 237, 237, 0.658);
        min-height: 35vh;
        display: grid;
        justify-content: center;
        align-items: center;
    }

    button {
        background: crimson;
        border: 2px solid crimson;
        cursor: pointer;
        color: white;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .button-container {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

    .menu-container {
        position: absolute;
        left: 50%; 
        top: 1%;
        
        transform: translateX(-50%); 
        display: flex;
        gap: 10px;
    }

    .men-item {
        border: 2px solid crimson;
        cursor: pointer;
        color: white;
        border-radius: 8px;
        padding: 6px 12px;
        transition: background 0.3s ease;
    }

    .non {
        cursor: pointer;
        color: white;
        border-radius: 8px;
        padding: 6px 12px;
        transition: background 0.3s ease;
    }

    .home {
        background: crimson;
    }

    .non:hover {
        background: crimson;
        border-color: crimson;
    }

    .men-item:hover {
        background: transparent;
        border-color: crimson;
    }

    @media (max-width: 768px) {
    
        .menu-container {
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>



</html>

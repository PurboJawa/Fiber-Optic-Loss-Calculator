<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Redaman Fiber Optik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
</head>
<body class="page1body">
    <div class="menu-container">
        <div class="men-item home" onclick="goToHome()">Home</div>
        <div class="menu-item non" onclick="goToCalculator()">Kalkulator</div>
        <div class="menu-item non" onclick="goToPanduan()">Panduan Pengguna</div>
    </div>
    <div class="container page1-container text-center">
        <h1>KALKULATOR REDAMAN FIBER OPTIK</h1>
        <p> Redaman sinyal menjadi aspek kritis yang memerlukan perhatian intensif. Redaman sendiri merupakan
            fenomena yang dapat mengurangi kekuatan sinyal saat melintasi fiber optik yang dapat disebabkan
            oleh beberapa faktor, seperti dispersi, penyerapan, dan scattering, yang dapat mempengaruhi keandalan
            dan kinerja jaringan secara keseluruhan.
        </p><br>
        <img src="1.jpeg" alt="" class="img-fluid" style="max-width: 100%; height: auto;"><br>
        <p>
            Kegunaan dari kalkulator ini adalah memberikan perkiraan seberapa besar 
            redaman yang terjadi pada panjang kabel yang dimasukkan oleh pengguna.
        </p><br><br><br>
        
        <div class="icon-container">
        <p>Contact Us</p>
        <div class="contact-icons">

        
            <a href="https://youtube.com/@Bumble.22?si=RuxIeW08cb_WJi_b"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/bumble.22?igsh=OGFpbThsbzNzMmZ5"><i class="fab fa-instagram"></i></a>
            <a href="broadbandmulmed@gmail.com" alt="broadbandmulmed@gmail.com"><i class="fas fa-envelope"></i></a>
            </div>
        </div>

    </div>
</body>
<script src="chart.js"></script>
<script>
    function goToHome(){
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
        .icon-container {
        display: flex;
        flex-direction: column; 
        justify-content: center; 
        align-items: center;
        position: absolute;
        bottom: 10px;
        left: 80%;
        transform: translateX(-50%);
    }

    .icon-container p {
        font-size: 14px; 
        margin-bottom: 5px; 
        color: black; 
    }

    .icon-container .contact-icons {
        display: flex;
        justify-content: space-between;
        width: 120px;
    }

    .icon-container a {
        font-size: 20px;
        color: black;
        padding: 6px;
        cursor: pointer;
    }
        .icon-container p {
        font-size: 14px; 
        margin: 0; 
        color: black; 
    }
    
    p {
        text-align: center;
    }

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
        display: flex; 
        flex-direction: column; 
        align-items: center;
        justify-content: center;
        position: relative;
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

    .non:hover {
        background: crimson;
        border-color: crimson;
    }

    .men-item:hover {
        background: transparent;
        border-color: crimson;
    }

    .home {
        background: crimson;
    }

    .non {
        cursor: pointer;
        color: white;
        border-radius: 8px;
        padding: 6px 12px;
        transition: background 0.3s ease;
    }

</style>
</html>

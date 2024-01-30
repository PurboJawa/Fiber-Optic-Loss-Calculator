<?php
// calculate.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $panjang_kabel = isset($_POST['panjang_kabel']) ? floatval($_POST['panjang_kabel']) : 0;
    $koefisien_redaman = isset($_POST['koefisien_redaman']) ? floatval($_POST['koefisien_redaman']) : 0;

  
    $nomor = 1;
    $redaman = $panjang_kabel * $koefisien_redaman;

  
    $result = array(
        'nomor' => $nomor,
        'panjang_kabel' => $panjang_kabel,
        'koefisien_redaman' => $koefisien_redaman,
        'redaman' => $redaman,
    );

   
    header('Content-Type: application/json');
    echo json_encode($result);
} else {

    header('Location: index.php'); 
    exit();
}
?>
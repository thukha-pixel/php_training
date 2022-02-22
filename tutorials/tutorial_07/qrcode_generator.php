<?php

include 'phpqrcode/qrlib.php';

$qrTxt = $_POST['qr-txt'];

if (!empty($qrTxt)) {
    mkdir('qr_img');
    $path = 'qr_img/';
    $file = $path . uniqid() . '.png';
    QRcode::png($qrTxt, $file, 5, 5);
    header('location: index.php?path=' . $file . '&correct=1');
} else {
    header('location: index.php?incorrect=1');
}

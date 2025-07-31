<?php
$baglanti = new mysqli("localhost", "root", "", "cimiclean");

if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

$adsoyad = $_POST['adsoyad'] ?? '';
$telefon = $_POST['telefon'] ?? '';

$sql = "INSERT INTO ziyaret (adsoyad, telefon) VALUES (?, ?)";
$sorgu = $baglanti->prepare($sql);
$sorgu->bind_param("ss", $adsoyad, $telefon);

if ($sorgu->execute()) {
    echo "✅ Kayıt başarıyla eklendi.";
} else {
    echo "❌ Hata: " . $sorgu->error;
}

$sorgu->close();
$baglanti->close();
?>

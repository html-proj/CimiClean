<?php
$baglanti = new mysqli("localhost", "root", "", "cimiclean");


if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

$adsoyad = $_POST['adsoyad'] ?? '';
$telefon = $_POST['telefon'] ?? '';
$adres = $_POST['adres'] ?? '';
$ekbilgi = $_POST['ekbilgi'] ?? '';

// Tarih veritabanı tarafından otomatik eklenecek
$sql = "INSERT INTO ziyaretciler (adsoyad, telefon, adres, ekbilgi) VALUES (?, ?, ?, ?)";
$sorgu = $baglanti->prepare($sql);

if (!$sorgu) {
    die("Sorgu hazırlanamadı: " . $baglanti->error);
}

$sorgu->bind_param("ssss", $adsoyad, $telefon, $adres, $ekbilgi);

if ($sorgu->execute()) {
    echo "✅ Bilgiler başarıyla kaydedildi.";
} else {
    echo "❌ Hata oluştu: " . $sorgu->error;
}

$sorgu->close();
$baglanti->close();
?>

<?php
$baglanti = new mysqli("localhost", "root", "", "siteveritabani");

if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

$sql = "SELECT * FROM ziyaretciler ORDER BY kayit_tarihi DESC";
$result = $baglanti->query($sql);

echo "<h2>Ziyaretçi Listesi</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<hr>";
        echo "<b>Ad Soyad:</b> " . htmlspecialchars($row['adsoyad']) . "<br>";
        echo "<b>Telefon:</b> " . htmlspecialchars($row['telefon']) . "<br>";
        echo "<b>Adres:</b> " . htmlspecialchars($row['adres']) . "<br>";
        echo "<b>Ek Bilgi:</b> " . nl2br(htmlspecialchars($row['ekbilgi'])) . "<br>";
        echo "<b>Kayıt Tarihi:</b> " . $row['kayit_tarihi'] . "<br>";
    }
} else {
    echo "Kayıt bulunamadı.";
}

$baglanti->close();
?>

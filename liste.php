<?php
$baglanti = new mysqli("localhost", "root", "", "cimiclean");

if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

$sql = "SELECT * FROM ziyaretciler ORDER BY id DESC";
$sonuc = $baglanti->query($sql);

echo "<!DOCTYPE html>
<html lang='tr'>
<head>
    <meta charset='UTF-8'>
    <title>Ziyaretçi Listesi</title>
</head>
<body>
<h2>Ziyaretçi Listesi</h2>";

if ($sonuc->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>ID</th>
                <th>Ad Soyad</th>
                <th>Telefon</th>
                <th>Adres</th>
                <th>Ek Bilgi</th>
            </tr>";
    while ($satir = $sonuc->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($satir['id']) . "</td>
                <td>" . htmlspecialchars($satir['adsoyad']) . "</td>
                <td>" . htmlspecialchars($satir['telefon']) . "</td>
                <td>" . htmlspecialchars($satir['adres']) . "</td>
                <td>" . nl2br(htmlspecialchars($satir['ekbilgi'])) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Hiç kayıt yok.";
}

echo "</body></html>";

$baglanti->close();
?>

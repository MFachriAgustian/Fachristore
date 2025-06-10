<?php
$conn = new mysqli("localhost", "root", "", "fachri_store");

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$aov_id = $_POST['aov_id'] ?? '';
$paket = $_POST['paket'] ?? '';
$jumlah = $_POST['jumlah'] ?? 1;
$whatsapp = $_POST['whatsapp'] ?? '';
$promo = $_POST['promo'] ?? '';
$metode = $_POST['metode'] ?? '';

if (!$aov_id || !$paket || !$jumlah || !$whatsapp || !$metode) {
  echo "❌ Data tidak lengkap!";
  exit;
}

$sql = "INSERT INTO transaksi_aov (aov_id, paket, jumlah, whatsapp, kode_promo, metode_pembayaran)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssisss", $aov_id, $paket, $jumlah, $whatsapp, $promo, $metode);

if ($stmt->execute()) {
  echo "✅ Transaksi berhasil disimpan!";
} else {
  echo "❌ Gagal menyimpan transaksi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<?php
$data = [
  "aov_id" => $_POST['aov_id'] ?? '',
  "paket" => $_POST['paket'] ?? '',
  "jumlah" => $_POST['jumlah'] ?? 1,
  "whatsapp" => $_POST['whatsapp'] ?? '',
  "promo" => $_POST['promo'] ?? '',
  "metode" => $_POST['metode'] ?? '',
  "waktu" => date("Y-m-d H:i:s")
];

if (!$data['aov_id'] || !$data['paket'] || !$data['jumlah'] || !$data['whatsapp'] || !$data['metode']) {
  echo "❌ Data belum lengkap!";
  exit;
}

file_put_contents("transaksi_aov.txt", json_encode($data) . PHP_EOL, FILE_APPEND);
echo "✅ Transaksi berhasil disimpan!";
?>

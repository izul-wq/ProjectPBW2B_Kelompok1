<?php
// Cek jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $psikolog = $_POST['psikolog'];
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "kesehatan_mental");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Simpan ke tabel booking
    $stmt = $conn->prepare("INSERT INTO booking (psikolog, nama, email, whatsapp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $psikolog, $nama, $email, $whatsapp);

    if ($stmt->execute()) {
        $berhasil = true;
    } else {
        $berhasil = false;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking Berhasil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">
  <div class="max-w-xl mx-auto mt-20 bg-white p-6 rounded-xl shadow-md text-center">
    <?php if ($berhasil): ?>
      <h1 class="text-2xl font-bold text-green-600 mb-4">Booking Berhasil!</h1>
      <p class="text-base">Terima kasih, <span class="font-semibold"><?= htmlspecialchars($nama) ?></span>.</p>
      <p class="mt-2">Kami akan menghubungi Anda via WhatsApp di nomor <span class="font-medium"><?= htmlspecialchars($whatsapp) ?></span>.</p>
      <a href="index.php" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Kembali ke Beranda</a>
    <?php else: ?>
      <h1 class="text-xl font-bold text-red-600">Booking Gagal!</h1>
      <p>Silakan coba lagi nanti.</p>
    <?php endif; ?>
  </div>
</body>
</html>

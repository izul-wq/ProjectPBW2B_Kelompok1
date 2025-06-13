<?php
// Ambil nama psikolog dari URL
$psikolog = isset($_GET['psikolog']) ? htmlspecialchars($_GET['psikolog']) : '';

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "kesehatan_mental");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data psikolog
$sql = "SELECT * FROM jadwal WHERE nama = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $psikolog);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Booking</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-900">
  <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-4">Booking Konsultasi</h1>

    <?php if ($data): ?>
      <div class="mb-6">
        <p class="text-gray-700 font-medium"><?= $data['nama'] ?><?= isset($data['gelar']) ? ', ' . $data['gelar'] : '' ?></p>
        <p class="text-sm text-gray-500"><?= $data['label'] ?></p>
        <p class="text-sm mt-1">Jadwal: <?= date('d M Y', strtotime($data['tanggal'])) ?> - <?= date('H:i', strtotime($data['jam'])) ?> WIB</p>
        <p class="text-sm text-green-600 font-semibold mt-1">Rp<?= number_format($data['harga'], 0, ',', '.') ?> / sesi</p>
      </div>

      <!-- Form Booking -->
      <form action="proses_booking.php" method="POST" class="space-y-4">
        <input type="hidden" name="psikolog" value="<?= $data['nama'] ?>">
        <div>
          <label class="block text-sm font-medium">Nama Anda</label>
          <input type="text" name="nama" required class="w-full mt-1 p-2 border rounded-md">
        </div>
        <div>
          <label class="block text-sm font-medium">Email</label>
          <input type="email" name="email" required class="w-full mt-1 p-2 border rounded-md">
        </div>
        <div>
          <label class="block text-sm font-medium">Nomor WhatsApp</label>
          <input type="text" name="whatsapp" required class="w-full mt-1 p-2 border rounded-md">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
          Konfirmasi Booking
        </button>
      </form>

    <?php else: ?>
      <p class="text-red-600">Data psikolog tidak ditemukan.</p>
    <?php endif; ?>
  </div>
</body>
</html>

<?php $conn->close(); ?>

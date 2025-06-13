<?php
// Koneksi ke database (ubah sesuai settingmu)
$conn = new mysqli("localhost", "root", "", "kesehatan_mental");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data jadwal
$sql = "SELECT * FROM jadwal ORDER BY tanggal DESC, jam DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Jadwal Konsultasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-900">

  <!-- Navbar -->
  <nav class="bg-emerald-100 shadow-md">
    <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <span class="text-2xl">🧠</span>
        <span class="text-2xl font-bold text-blue-600">InnerBloom</span>
      </div>
      <div class="space-x-6 text-gray-700 text-base font-medium">
        <a href="index.php" class="hover:text-blue-600 transition">Home</a>
        <a href="artikel.php" class="hover:text-blue-600 transition">Artikel</a>
        <a href="testimoni.php" class="hover:text-blue-600 transition">Testimoni</a>
        <a href="jadwal.php" class="hover:text-blue-600 transition">Jadwal</a>
      </div>
    </div>
  </nav>

  <!-- Judul -->
  <h1 class="text-3xl font-bold mt-6 mb-6 max-w-4xl mx-auto">Jadwal Konsultasi</h1>

  <!-- Daftar Psikolog -->
  <div class="max-w-4xl mx-auto space-y-4 mb-12">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="bg-white border rounded-xl p-4 shadow-sm hover:shadow-md transition">
        <!-- Label -->
        <span class="text-sm text-yellow-700 bg-yellow-100 px-2 py-1 rounded-full font-medium">
          <?= htmlspecialchars($row['label']) ?>
        </span>

        <!-- Nama dan Gelar -->
        <h2 class="text-lg font-semibold mt-2">
          <?= htmlspecialchars($row['nama']) ?><?= isset($row['gelar']) ? ', ' . htmlspecialchars($row['gelar']) : '' ?>
        </h2>

        <!-- Pengalaman dan Jadwal -->
        <p class="text-sm text-gray-600 mt-1">
          Pengalaman: <?= htmlspecialchars($row['pengalaman']) ?> tahun<br>
          Jadwal: <?= date('d M Y', strtotime($row['tanggal'])) ?> - <?= date('H:i', strtotime($row['jam'])) ?> WIB
        </p>

        <!-- Harga -->
        <p class="text-base font-semibold text-green-600 mt-2">
          Rp<?= number_format($row['harga'], 0, ',', '.') ?> / sesi
        </p>

        <!-- Tombol Booking -->
        <a href="booking.php?psikolog=<?= urlencode($row['nama']) ?>" class="mt-3 inline-block bg-orange-500 hover:bg-orange-600 text-white text-sm px-4 py-2 rounded-lg font-medium">
          Booking Sekarang
        </a>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Footer -->
  <footer class="bg-white border-t mt-auto">
  <div class="bg-emerald-100 text-center text-xs text-gray-500 py-3">
    &copy; <?= date('Y') ?> InnerBloom. All rights reserved.
  </div>
</footer>

</body>
</html>

<?php $conn->close(); ?>

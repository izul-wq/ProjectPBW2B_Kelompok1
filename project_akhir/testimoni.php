<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Testimoni Pengguna</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

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

<div class="max-w-6xl mx-auto mt-10 px-4">
  <h2 class="text-3xl font-bold mb-8 text-center">Testimoni Pengguna</h2>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php 
    $result = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY id DESC");
    while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-4">
          <div class="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center text-blue-700 font-bold text-lg">
            <?= strtoupper(substr($row['nama'], 0, 1)) ?>
          </div>
          <div>
            <p class="font-semibold"><?= htmlspecialchars($row['nama']) ?></p>
            <p class="text-sm text-gray-500">Pengguna</p>
          </div>
        </div>
        <p class="text-gray-700 italic">“<?= htmlspecialchars($row['pesan']) ?>”</p>
      </div>
    <?php } ?>
  </div>
</div>

  <!-- Footer -->
  <footer class="bg-white border-t mt-6">
  <div class="bg-emerald-100 text-center text-xs text-gray-500 py-3">
    &copy; <?= date('Y') ?> InnerBloom. All rights reserved.
  </div>
</footer>

</body>
</html>
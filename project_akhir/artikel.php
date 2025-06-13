<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $isi = $_POST['isi'] ?? '';
    $sumber = $_POST['sumber'] ?? '';

    if (!empty($judul) && !empty($isi)) {
        $stmt = $conn->prepare("INSERT INTO artikel (judul, isi, sumber) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $judul, $isi, $sumber);
        $stmt->execute();
        $stmt->close();

        header('Location: artikell.php');
        exit;
    } else {
        $error = "Judul dan isi tidak boleh kosong.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Artikel</title>
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

<!-- Konten -->
<div class="max-w-6xl mx-auto p-6">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold">Daftar Artikel</h2>
    <a href="tambah_artikel.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Artikel</a>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    $result = $conn->query("SELECT * FROM artikell ORDER BY id DESC");
    while ($row = $result->fetch_assoc()) {
    ?>
      <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
        <h3 class="text-xl font-semibold text-blue-700 mb-2"><?= htmlspecialchars($row['judul']) ?></h3>
        <p class="text-sm text-gray-500 mb-4"><?= mb_strimwidth(strip_tags($row['isi']), 0, 100, "...") ?></p>
        <div class="flex justify-between text-sm">
          <a href="lihat_artikel.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:underline">Lihat</a>
          <div class="space-x-2">
            <a href="edit_artikel.php?id=<?= $row['id'] ?>" class="text-yellow-500 hover:underline">Edit</a>
            <a href="hapus_artikel.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">Hapus</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

  <!-- Footer -->
  <footer class="bg-white border-t mt-auto">
  <div class="bg-emerald-100 text-center text-xs text-gray-500 py-3">
    &copy; <?= date('Y') ?> InnerBloom. All rights reserved.
  </div>
</footer>

</body>
</html>
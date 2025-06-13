<?php
include 'db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $isi = $_POST['isi'] ?? '';
    $sumber = $_POST['sumber'] ?? '';

    if (!empty($judul) && !empty($isi)) {
        $stmt = $conn->prepare("INSERT INTO artikell (judul, isi, sumber) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("sss", $judul, $isi, $sumber);
        $stmt->execute();
        $stmt->close();

        // Redirect kembali ke artikel.php
        header('Location: artikel.php');
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
    <title>Tambah Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-green-50 text-gray-800">
<div id="formTambah" class="bg-white p-6 rounded shadow-md max-w-xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Tambah Artikel</h2>
    <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4"><?= $error ?></div>
    <?php endif; ?>
    <form action="" method="POST" class="space-y-4">
        <input type="text" name="judul" placeholder="Judul Artikel" class="w-full p-2 border rounded" required>
        <input type="url" name="sumber" placeholder="Link sumber (opsional)" class="w-full p-2 border rounded">
        <textarea name="isi" placeholder="Isi Artikel" class="w-full p-2 border rounded" rows="6" required></textarea>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
    </form>
</div>
</body>
</html>

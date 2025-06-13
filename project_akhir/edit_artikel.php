<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM artikell WHERE id = $id");
    $artikel = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $sumber = $_POST['sumber'];

    $stmt = $conn->prepare("UPDATE artikell SET judul = ?, isi = ?, sumber = ? WHERE id = ?");
    $stmt->bind_param("sssi", $judul, $isi, $sumber, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: artikel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artikel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800 p-6">
    <div id="formTambah" class="bg-white p-6 rounded shadow-md max-w-xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Artikel</h2>
    <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4"><?= $error ?></div>
    <?php endif; ?>
    <form action="" method="POST" class="space-y-4">
        <input type="text" name="judul" value="<?= htmlspecialchars($artikel['judul']) ?>" placeholder="Judul Artikel" class="w-full p-2 border rounded" required>
        <input type="url" name="sumber" value="<?= htmlspecialchars($artikel['sumber']) ?>" placeholder="Link sumber (opsional)" class="w-full p-2 border rounded">
        <textarea name="isi" placeholder="Isi Artikel" class="w-full p-2 border rounded" rows="6" required><?= htmlspecialchars($artikel['isi']) ?></textarea>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
    </form>
</div>
</body>
</html>
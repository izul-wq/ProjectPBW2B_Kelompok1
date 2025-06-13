<?php
include 'db.php';

$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM artikell WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$artikell = $result->fetch_assoc();
$stmt->close();

if (!$artikell) {
    echo "Artikel tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($artikell['judul']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-green-50 text-gray-800 max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-4"><?= htmlspecialchars($artikell['judul']) ?></h1>
    <div class="prose">
        <p><?= nl2br(htmlspecialchars($artikell['isi'])) ?></p>
    </div>

    <?php if (!empty($artikell['sumber'])): ?>
        <div class="mt-6">
            <a href="<?= htmlspecialchars($artikell['sumber']) ?>" target="_blank" class="text-blue-600 underline">
                Baca sumber asli
            </a>
        </div>
    <?php endif; ?>

    <div class="mt-6">
        <a href="artikel.php" class="text-green-700 hover:underline">← Kembali ke daftar artikel</a>
    </div>

</body>
</html>

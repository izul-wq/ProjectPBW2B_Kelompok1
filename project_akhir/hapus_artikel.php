<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM artikell WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: artikel.php");
exit;

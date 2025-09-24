<?php
require '../dbConnection.php';

$certificate_id = $_GET['id'] ?? '';

if (!$certificate_id) {
    die("Invalid certificate ID.");
}

// Delete certificate
$stmt = $conn->prepare("DELETE FROM certificates WHERE id = ?");
$stmt->bind_param("i", $certificate_id);

if ($stmt->execute()) {
    // Redirect back with success message
    header("Location: index.php?");
    exit;
} else {
    die("Error deleting certificate: " . $stmt->error);
}
?>
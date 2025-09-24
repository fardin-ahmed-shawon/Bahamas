<?php
$page_title = "Edit Certificate Info";
require 'header.php';

$certificate_id = $_GET['id'] ?? '';
if (!$certificate_id) {
    die("No certificate ID provided.");
}

$success_msg = '';
$error_msg = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seafarer_name = $_POST['seafarer_name'];
    $nationality = $_POST['nationality'];
    $capacity = $_POST['capacity'];
    $certificate_type = $_POST['certificate_type'];
    $tracking_number = $_POST['tracking_number'];
    $date_of_issue = $_POST['date_of_issue'];
    $date_of_expiry = $_POST['date_of_expiry'];
    $certificate_status = $_POST['certificate_status'];

    $stmt = $conn->prepare("UPDATE certificates SET seafarer_name=?, nationality=?, capacity=?, certificate_type=?, tracking_number=?, date_of_issue=?, date_of_expiry=?, certificate_status=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $seafarer_name, $nationality, $capacity, $certificate_type, $tracking_number, $date_of_issue, $date_of_expiry, $certificate_status, $certificate_id);

    if ($stmt->execute()) {
        $success_msg = "Certificate updated successfully!";
    } else {
        $error_msg = "Error updating certificate: " . $stmt->error;
    }
}

// Fetch existing certificate data
$stmt = $conn->prepare("SELECT * FROM certificates WHERE id = ?");
$stmt->bind_param("i", $certificate_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Certificate not found.");
}

$cert = $result->fetch_assoc();
?>

<style>
    body { background: #f4f6f9; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; }
    .navbar { background: #2c2c74; }
    .navbar-brand img { height: 50px; }
    .form-section { max-width: 700px; margin: 40px auto; background: #fff; border-radius: 15px; padding: 30px 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
    .form-section h3 { font-size: 24px; font-weight: 600; margin-bottom: 15px; color: #0078D7; }
    label { font-weight: 600; margin-top: 15px; }
    input, select { border-radius: 8px !important; }
    .form-control:focus { border-color: #0078D7; box-shadow: 0 0 0 0.2rem rgba(0,120,215,0.25); }
    .btn-submit { background: #0078D7; border: none; padding: 12px 25px; border-radius: 10px; font-size: 16px; font-weight: 600; color: white; transition: all 0.3s ease; }
    .btn-submit:hover { background: #005fa3; transform: translateY(-2px); }
    .alert { padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; }
    .alert-success { background: #d4edda; color: #155724; }
    .alert-error { background: #f8d7da; color: #721c24; }
</style>

<div class="form-section">
    <h3>Edit Certificate Information</h3>

    <?php if($success_msg): ?>
        <div class="alert alert-success"><?= $success_msg ?></div>
    <?php endif; ?>

    <?php if($error_msg): ?>
        <div class="alert alert-error"><?= $error_msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="seafarer_name">(*) Seafarer Name</label>
            <input type="text" class="form-control" name="seafarer_name" value="<?= htmlspecialchars($cert['seafarer_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control" name="nationality" value="<?= htmlspecialchars($cert['nationality']) ?>">
        </div>
        <div class="mb-3">
            <label for="capacity">(*) Capacity</label>
            <input type="text" class="form-control" name="capacity" value="<?= htmlspecialchars($cert['capacity']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="certificate_type">(*) Certificate Type</label>
            <input type="text" class="form-control" name="certificate_type" value="<?= htmlspecialchars($cert['certificate_type']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="tracking_number">(*) Tracking Number</label>
            <input type="text" class="form-control" name="tracking_number" value="<?= htmlspecialchars($cert['tracking_number']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="date_of_issue">(*) Date of Issue</label>
            <input type="date" class="form-control" name="date_of_issue" value="<?= $cert['date_of_issue'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="date_of_expiry">(*) Date of Expiry</label>
            <input type="date" class="form-control" name="date_of_expiry" value="<?= $cert['date_of_expiry'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="certificate_status">Certificate Status</label>
            <input type="text" class="form-control" name="certificate_status" value="<?= htmlspecialchars($cert['certificate_status']) ?>">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn-submit">Update Certificate</button>
        </div>
    </form>
</div>

<?php require 'footer.php'; ?>
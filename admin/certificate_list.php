<?php
$page_title = "Certificate List";
require 'header.php';

// Handle search
$search = $_GET['search'] ?? '';
$certificates = [];

if ($search) {
    $stmt = $conn->prepare("SELECT * FROM certificates 
                            WHERE seafarer_name LIKE ? 
                               OR nationality LIKE ? 
                               OR capacity LIKE ? 
                               OR certificate_type LIKE ? 
                               OR tracking_number LIKE ? 
                            ORDER BY created_at DESC");
    $like = "%$search%";
    $stmt->bind_param("sssss", $like, $like, $like, $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM certificates ORDER BY created_at DESC");
}

if ($result && $result->num_rows > 0) {
    $certificates = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!-------------------------->
<!-----START MAIN AREA------>
<!-------------------------->

<div class="row mb-4">
    <div class="col-md-6">
        <form method="get" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search certificates..." 
                   value="<?= htmlspecialchars($search) ?>">
            <button type="submit" class="btn btn-dark">Search</button>
        </form>
    </div>
</div>

<?php if (!empty($certificates)): ?>
<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Seafarer Name</th>
                <th>Nationality</th>
                <th>Capacity</th>
                <th>Certificate Type</th>
                <th>Tracking Number</th>
                <th>Date of Issue</th>
                <th>Date of Expiry</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($certificates as $cert): ?>
            <tr>
                <td><?= $cert['id'] ?></td>
                <td><?= htmlspecialchars($cert['seafarer_name']) ?></td>
                <td><?= htmlspecialchars($cert['nationality']) ?></td>
                <td><?= htmlspecialchars($cert['capacity']) ?></td>
                <td><?= htmlspecialchars($cert['certificate_type']) ?></td>
                <td><?= htmlspecialchars($cert['tracking_number']) ?></td>
                <td><?= $cert['date_of_issue'] ?></td>
                <td><?= $cert['date_of_expiry'] ?></td>
                <td><?= htmlspecialchars($cert['certificate_status']) ?></td>
                <td>
                    <a href="edit_certificate.php?id=<?= $cert['id'] ?>" class="btn btn-sm btn-warning"><b>Edit</b></a>
                </td>
                <td>
                    <a href="delete_certificate.php?id=<?= $cert['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this certificate?');"><b>Delete</b></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
    <div class="alert alert-warning">No certificates found.</div>
<?php endif; ?>

<!-------------------------->
<!----- END MAIN AREA------>
<!-------------------------->

<?php
require 'footer.php';
?>
<?php
$page_title = "Dashboard";
require 'header.php';

// Fetch certificates
$certificates = [];
$sql = "SELECT * FROM certificates ORDER BY created_at DESC LIMIT 20";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $certificates = $result->fetch_all(MYSQLI_ASSOC);
}

// Stats
$totalCertificates = count($certificates);
?>

<!-------------------------->
<!-----START MAIN AREA------>
<!-------------------------->

<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="card card-stats text-center bg-dark">
            <div class="card-body">
                <h2 class="text-white"><?= $totalCertificates ?></h2>
                <p class="text-white"><b>Total Certificates</b></p>
            </div>
        </div>
    </div>
</div><br>

<!-- Certificate List -->
<h3 class="section-title">Certificate List</h3>
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
                    <th>Created At</th>
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
                    <td><?= $cert['created_at'] ?></td>
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
    <a href="certificate_list.php" class="btn btn-dark px-4 py-2">See All</a>
<?php else: ?>
    <div class="alert alert-warning mt-3">No certificates found.</div>
<?php endif; ?>

<!-------------------------->
<!----- END MAIN AREA------>
<!-------------------------->

<?php
require 'footer.php';
?>
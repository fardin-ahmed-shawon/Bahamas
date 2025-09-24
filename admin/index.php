<?php
$page_title = "Dashboard";
require 'header.php';
?>
<!-------------------------->
<!-----START MAIN AREA------>
<!-------------------------->

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card card-stats text-center bg-dark">
                <div class="card-body">
                    <h2 class="text-white">5</h2>
                    <br>
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
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Document Serial</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $app): ?>
                    <tr>
                        <td><?= $app['id'] ?></td>
                        <td><?= htmlspecialchars($app['first_name']." ".$app['middle_name']." ".$app['surname']) ?></td>
                        <td><?= $app['date_of_birth'] ?></td>
                        <td><?= htmlspecialchars($app['email']) ?></td>
                        <td><?= htmlspecialchars($app['document_serial']) ?></td>
                        <td><?= $app['created_at'] ?></td>
                        <td>
                            <a href="view_application.php?id=<?= $app['id'] ?>" class="btn btn-sm btn-dark text-white"><b>Details</b></a>
                            <a href="edit_application.php?id=<?= $app['id'] ?>" class="btn btn-sm btn-warning"><b>Edit</b></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="application_list.php" class="btn btn-dark px-4 py-2">See All</a>
    <?php else: ?>
        <div class="alert alert-warning mt-3">No applications found.</div>
    <?php endif; ?>


<!-------------------------->
<!----- END MAIN AREA------>
<!-------------------------->

<?php
require 'footer.php';
?>
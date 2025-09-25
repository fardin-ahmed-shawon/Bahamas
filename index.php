<?php
$current_page = basename($_SERVER['PHP_SELF']); 
$page_title = 'Verify Certificate';
require 'header.php'; 
?>

<style>
    button {
        background: #000;
        color: #fff;
        border: 0;
        outline: 0;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    button:hover {
        background: #0e788b;
        color: #fff;
    }

    .sidebar .nav .nav-item.active > .nav-link .menu-title {
        color: #0e788b;
    }
</style>

<div class="content-wrapper">
  <div class="container my-5">
    <div class="card shadow border-0 rounded-3">
      <div class="card-body p-4">
        <h1 class="mb-4 text-info fw-bold py-4">
          Verify Certificate
        </h1>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4" id="certTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active d-flex align-items-center gap-2" id="vessel-tab" data-bs-toggle="tab" data-bs-target="#vesselFields" type="button" role="tab" aria-controls="vesselFields" aria-selected="true">
              <i class="bi bi-ship"></i> <b>Vessel / Company</b>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link d-flex align-items-center gap-2" id="seafarer-tab" data-bs-toggle="tab" data-bs-target="#seafarerFields" type="button" role="tab" aria-controls="seafarerFields" aria-selected="false">
              <i class="bi bi-person-badge"></i> <b>Seafarer</b>
            </button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="certTabsContent">

          <!-- Vessel/Company -->
          <div class="tab-pane fade show active" id="vesselFields" role="tabpanel" aria-labelledby="vessel-tab">
            <form method="POST">
              <div class="mb-3">
                <label for="trackingNumber1" class="form-label fw-semibold">Tracking Number</label>
                <input type="text" name="tracking_number" class="form-control form-control-lg rounded-3" id="trackingNumber1" placeholder="Enter tracking number" required>
              </div>

              <div class="mb-3">
                <label for="issuedDate" class="form-label fw-semibold">Issued Date</label>
                <input type="date" class="form-control form-control-lg rounded-3" id="issuedDate">
              </div>

              <div class="mb-3">
                <label for="imoNumber" class="form-label fw-semibold">IMO Number</label>
                <input type="text" class="form-control form-control-lg rounded-3" id="imoNumber" placeholder="Enter IMO Number">
              </div>
             
              <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="reset">Reset</button>
                <button type="submit" name="verify_vessel">Verify Certificate</button>
              </div>
            </form>
          </div>

          <!-- Seafarer -->
          <div class="tab-pane fade" id="seafarerFields" role="tabpanel" aria-labelledby="seafarer-tab">
            <form method="POST">
              <div class="mb-3">
                <label for="trackingNumber2" class="form-label fw-semibold">Tracking Number</label>
                <input type="text" name="tracking_number" class="form-control form-control-lg rounded-3" id="trackingNumber2" placeholder="Enter tracking number" required>
              </div>

              <div class="mb-3">
                <label for="surname" class="form-label fw-semibold">Surname as in passport</label>
                <input type="text" class="form-control form-control-lg rounded-3" id="surname" placeholder="Enter surname">
              </div>

              <div class="mb-3">
                <label for="dob" class="form-label fw-semibold">Date of Birth</label>
                <input type="date" class="form-control form-control-lg rounded-3" id="dob" >
              </div>

              <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="reset">Reset</button>
                <button type="submit" name="verify_seafarer">Verify Certificate</button>
              </div>
            </form>
          </div>

        </div>

        <!-- PHP Verification -->
        <?php
        if (isset($_POST['verify_vessel']) || isset($_POST['verify_seafarer'])) {

            $tracking_number = trim($_POST['tracking_number']);

            $stmt = $conn->prepare("SELECT * FROM certificates WHERE tracking_number = ?");
            $stmt->bind_param("s", $tracking_number);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $cert = $result->fetch_assoc();
                ?>
                <!-- Card UI -->
                <div class="container my-4">
                  <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-info text-white rounded-top-4">
                      <h5 class="mb-0">Certificate Verified</h5>
                    </div>
                    <div class="card-body p-4">
                      <div class="row">
                        <div class="col-md-6">
                          <p><b>Seafarer Name:</b> <?= htmlspecialchars($cert['seafarer_name']) ?></p>
                          <p><b>Nationality:</b> <?= htmlspecialchars($cert['nationality']) ?></p>
                          <p><b>Capacity:</b> <?= htmlspecialchars($cert['capacity']) ?></p>
                          <p><b>Certificate Type:</b> <?= htmlspecialchars($cert['certificate_type']) ?></p>
                        </div>
                        <div class="col-md-6">
                          <p><b>Tracking Number:</b> <?= htmlspecialchars($cert['tracking_number']) ?></p>
                          <p><b>Date of Issue:</b> <?= htmlspecialchars($cert['date_of_issue']) ?></p>
                          <p><b>Date of Expiry:</b> <?= htmlspecialchars($cert['date_of_expiry']) ?></p>
                          <p><b>Status:</b> <?= htmlspecialchars($cert['certificate_status']) ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
            } else {
                echo '<div class="alert alert-danger mt-4">Certificate not found. Please check the tracking number.</div>';
            }
        }
        ?>

      </div>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>
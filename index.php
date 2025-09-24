<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
$page_title = 'Blank'; // Set the page title
?>
<?php require 'header.php'; ?>
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

    .sidebar .nav .nav-item.active > .nav-link .menu-title {
        color: #0e788b;
    }
</style>

<!--------------------------->
<!-- START MAIN AREA -->
<!--------------------------->
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
            <form>
              <div class="mb-3">
                <label for="trackingNumber1" class="form-label fw-semibold">Tracking Number</label>
                <input type="text" class="form-control form-control-lg rounded-3" id="trackingNumber1" placeholder="Enter tracking number">
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
                <button type="submit">Verify Certificate</button>
              </div>

            </form>
          </div>

          <!-- Seafarer -->
          <div class="tab-pane fade" id="seafarerFields" role="tabpanel" aria-labelledby="seafarer-tab">
            <form>
              <div class="mb-3">
                <label for="trackingNumber2" class="form-label fw-semibold">Tracking Number</label>
                <input type="text" class="form-control form-control-lg rounded-3" id="trackingNumber2" placeholder="Enter tracking number">
              </div>

              <div class="mb-3">
                <label for="surname" class="form-label fw-semibold">Surname as in passport</label>
                <input type="text" class="form-control form-control-lg rounded-3" id="surname" placeholder="Enter surname">
              </div>

              <div class="mb-3">
                <label for="dob" class="form-label fw-semibold">Date of Birth</label>
                <input type="date" class="form-control form-control-lg rounded-3" id="dob">
              </div>

              <div class="d-flex justify-content-end gap-2 mt-4">
                <button type="reset">Reset</button>
                <button type="submit">Verify Certificate</button>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!--------------------------->
<!-- END MAIN AREA -->
<!--------------------------->

<?php require 'footer.php'; ?>
<?php
$page_title = "Add Certificate Info";
require 'header.php';
?>

<style>
    body {
      background: #f4f6f9;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-brand img { height: 50px; }
    .form-section {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      border-radius: 15px;
      padding: 30px 40px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    .form-section h3 { font-size: 24px; font-weight: 600; margin-bottom: 15px; color: #0078D7; }
    label { font-weight: 600; margin-top: 15px; }
    input, select { border-radius: 8px !important; }
    .form-control:focus { border-color: #0078D7; box-shadow: 0 0 0 0.2rem rgba(0, 120, 215, 0.25); }
    .btn-submit {
      background: #0078D7;
      border: none;
      padding: 12px 25px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      color: white;
      transition: all 0.3s ease;
    }
    .btn-submit:hover { background: #005fa3; transform: translateY(-2px); }
</style>

<div class="form-section">
    <h3>Application for Verification of Certificate</h3>
    <form action="certificate_info_store.php" method="POST">
        <div class="mb-3">
            <label for="seafarer_name">(*) Seafarer Name</label>
            <input type="text" class="form-control" name="seafarer_name" placeholder="Enter Name" required>
        </div>
        <div class="mb-3">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality">
        </div>
        <div class="mb-3">
            <label for="capacity">(*) Capacity</label>
            <input type="text" class="form-control" name="capacity" required>
        </div>
        <div class="mb-3">
            <label for="certificate_type">(*) Certificate Type</label>
            <input type="text" class="form-control" name="certificate_type" required>
        </div>
        <div class="mb-3">
            <label for="tracking_number">(*) Tracking Number</label>
            <input type="text" class="form-control" name="tracking_number" required>
        </div>
        <div class="mb-3">
            <label for="date_of_issue">(*) Date of Issue</label>
            <input type="date" class="form-control" name="date_of_issue" required>
        </div>
        <div class="mb-3">
            <label for="date_of_expiry">(*) Date of Expiry</label>
            <input type="date" class="form-control" name="date_of_expiry" required>
        </div>
        <div class="mb-3">
            <label for="certificate_status">Certificate Status</label>
            <input type="text" class="form-control" name="certificate_status" placeholder="Enter Status">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn-submit">Submit Application</button>
        </div>
    </form>
</div>

<?php require 'footer.php'; ?>
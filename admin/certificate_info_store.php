<?php
require '../dbConnection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect data from the simplified form
    $seafarer_name = trim($_POST['seafarer_name']);
    $nationality = trim($_POST['nationality']);
    $capacity = trim($_POST['capacity']);
    $certificate_type = trim($_POST['certificate_type']);
    $tracking_number = trim($_POST['tracking_number']);
    $date_of_issue = $_POST['date_of_issue'];
    $date_of_expiry = $_POST['date_of_expiry'];
    $certificate_status = trim($_POST['certificate_status']);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO certificates 
        (seafarer_name, nationality, capacity, certificate_type, tracking_number, date_of_issue, date_of_expiry, certificate_status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "ssssssss",
        $seafarer_name,
        $nationality,
        $capacity,
        $certificate_type,
        $tracking_number,
        $date_of_issue,
        $date_of_expiry,
        $certificate_status
    );

    if ($stmt->execute()) {
        echo "<div style='max-width:600px;margin:50px auto;padding:20px;background:#d4edda;color:#155724;border-radius:10px;'>
                Information submitted successfully!<br>
                Your Tracking Number: <strong>{$tracking_number}</strong>
                <a href='index.php' style='display:inline-block;margin-top:10px;color:#155724;text-decoration:underline;'>Go To Dashboard</a>
              </div>";
    } else {
        echo "<div style='max-width:600px;margin:50px auto;padding:20px;background:#f8d7da;color:#721c24;border-radius:10px;'>
                Error submitting application: " . $stmt->error . "
              </div>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid access.";
}
?>
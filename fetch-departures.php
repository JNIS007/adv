<?php
include("./admin/includes/config.php");

header('Content-Type: application/json');

// Get POST data
$startDate = $_POST['start_date'] ?? '';
$endDate = $_POST['end_date'] ?? '';
$postId = $_POST['post_id'] ?? 0;

// Validate inputs
if (empty($startDate) || empty($endDate) || empty($postId)) {
    echo json_encode(['error' => 'Invalid parameters']);
    exit;
}

// Prepare and execute query
$query = "SELECT * FROM tblpostdetails 
          WHERE post_id = ? 
          AND start_date = ? 
          AND end_date = ?
          ORDER BY start_date ASC";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "iss", $postId, $startDate, $endDate);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$departures = [];
while ($row = mysqli_fetch_assoc($result)) {
    $departures[] = $row;
}

// Return JSON response
echo json_encode($departures);
?>
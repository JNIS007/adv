<?php
include('./admin/includes/config.php');

$postId = $_POST['post_id'];
$getAll = isset($_POST['get_all']) && $_POST['get_all'] == 'true';

if ($getAll) {
    $query = "SELECT * FROM tblpostdetails WHERE post_id = $postId";
} else {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $query = "SELECT * FROM tblpostdetails 
              WHERE post_id = $postId 
              AND start_date = '$startDate' 
              AND end_date = '$endDate'";
}

$result = mysqli_query($con, $query);
$departures = array();

while($row = mysqli_fetch_assoc($result)) {
    $departures[] = $row;
}

echo json_encode($departures);
?>
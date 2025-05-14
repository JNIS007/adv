<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $related_post_id = intval($_POST['related_post_id']);
    $start_date = mysqli_real_escape_string($con, $_POST['start']);
    $end_date = mysqli_real_escape_string($con, $_POST['end']);
    $cost = floatval($_POST['cost']);

    // Optional: validate date and cost input
    if ($related_post_id && $start_date && $end_date && $cost > 0) {
        // Insert into tblpostdetails or another related table
        $query = mysqli_query($con, "INSERT INTO tblpostdetails (post_id, start_date, end_date, cost_per_person, is_active) VALUES ('$related_post_id', '$start_date', '$end_date', '$cost', 1)");

        if ($query) {
            $_SESSION['msg'] = "Departure successfully added!";
        } else {
            $_SESSION['error'] = "Error inserting departure: " . mysqli_error($con);
        }
    } else {
        $_SESSION['error'] = "All fields are required and must be valid.";
    }

    header('location:add-dep.php');
    exit();
}
?>

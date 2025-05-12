<?php
// top.php - Form submission handler
session_start();
include('includes/config.php');

// Check if user is logged in
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $related_post_id = isset($_POST['related_post_id']) ? intval($_POST['related_post_id']) : 0;
    
    // Validate the selected post exists
    $query = mysqli_query($con, "SELECT * FROM tblposts WHERE id = '$related_post_id' AND Is_Active = 1");
    
    if (mysqli_num_rows($query) > 0) {
        $post_data = mysqli_fetch_assoc($query);
        
        // Check if this post already exists in topposts
        $check_query = mysqli_query($con, "SELECT id FROM topposts WHERE id = '$related_post_id'");
        
        if (mysqli_num_rows($check_query) == 0) {
            // Insert into topposts table using direct column mapping
            $insert_query = "INSERT INTO topposts 
                            SELECT *
                            FROM tblposts 
                            WHERE id = '$related_post_id'";
            
            if (mysqli_query($con, $insert_query)) {
                $_SESSION['msg'] = "Adventure successfully added to Top Adventures!";
            } else {
                $_SESSION['error'] = "Error: " . mysqli_error($con);
            }
        } else {
            $_SESSION['error'] = "This adventure is already in Top Adventures!";
        }
    } else {
        $_SESSION['error'] = "Invalid adventure selected";
    }
    
    header('location:add-top.php'); // Redirect back to the form page
    exit();
}
?>
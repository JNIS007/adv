<?php
session_start();
include('includes/config.php');

if (isset($_POST['submit'])) {
    $content = mysqli_real_escape_string($con, $_POST['content']);

    // Image Upload
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = 'uploads/' . $image;

    if (move_uploaded_file($image_tmp, $image_path)) {
        $query = "INSERT INTO whytravelwithus (image_path, content) VALUES ('$image_path', '$content')";
        if (mysqli_query($con, $query)) {
            $_SESSION['msg'] = "Visa info added successfully!";
        } else {
            $_SESSION['error'] = "Failed to insert!";
        }
    } else {
        $_SESSION['error'] = "Image upload failed!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Adventure | Why Travel With Us</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <?php if (isset($_SESSION["msg"])) {
                        echo "<div class='alert alert-success'>" . $_SESSION["msg"] . "</div>";
                        unset($_SESSION["msg"]);
                    } ?>
                    <?php if (isset($_SESSION["error"])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION["error"] . "</div>";
                        unset($_SESSION["error"]);
                    } ?>

                    <form method="POST" action="#" enctype="multipart/form-data">
                        <label>Upload Image:</label><br>
                        <input type="file" name="image" required><br><br>

                        <label>Content:</label><br>
                        <textarea name="content" id="content" rows="10" cols="80"></textarea>
                        <script>CKEDITOR.replace('content');</script><br>

                        <button type="submit" name="submit">Submit</button>
                    </form>



                    <!-- end row -->


                </div> <!-- container -->

            </div> <!-- content -->

            <?php include('includes/footer.php'); ?>

        </div>


    </div>
    <!-- END wrapper -->



    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>
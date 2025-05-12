<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0) { 
    header('location:index.php');
} else {

if(isset($_GET['action']) && $_GET['action']=='del') {
    $postid = intval($_GET['pid']);
    $query = mysqli_query($con,"DELETE FROM popularposts WHERE id='$postid'");
    if($query) {
        $_SESSION['msg'] = "Post removed from Top Adventures";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";    
    }
    header('location:manage-top.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App title -->
    <title>Adventure | Manage Top Adventures</title>

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
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>
        <!-- Left Sidebar Start -->
        <?php include('includes/leftsidebar.php');?>

        <!-- Start right Content -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Success/Error Messages -->
                    <?php if(isset($_SESSION["msg"])): ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> <?php echo htmlentities($_SESSION["msg"]); ?>
                        </div>
                        <?php unset($_SESSION["msg"]); ?>
                    <?php endif; ?>

                    <?php if(isset($_SESSION["error"])): ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Error!</strong> <?php echo htmlentities($_SESSION["error"]); ?>
                        </div>
                        <?php unset($_SESSION["error"]); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Manage Top Adventures</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">Top Adventures</a></li>
                                    <li class="active">Manage Popular Adventures</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="table-responsive">
                                    <table class="table table-colored table-centered table-inverse m-0">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT t.id as postid, t.PostTitle as title, c.CategoryName as category 
                                                                        FROM popularposts t 
                                                                        LEFT JOIN tblcategory c ON c.id = t.CategoryId");
                                            $rowcount = mysqli_num_rows($query);
                                            
                                            if($rowcount == 0): ?>
                                                <tr>
                                                    <td colspan="3" align="center"><h3 style="color:red">No top adventures found</h3></td>
                                                </tr>
                                            <?php else: 
                                                while($row = mysqli_fetch_array($query)): ?>
                                                    <tr>
                                                        <td><b><?php echo htmlentities($row['title']);?></b></td>
                                                        <td><?php echo htmlentities($row['category'])?></td>
                                                        <td>
                                                            <a href="manage-pop.php?pid=<?php echo htmlentities($row['postid']);?>&action=del" 
                                                               onclick="return confirm('Are you sure you want to remove this from Top Adventures?')">
                                                                <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; 
                                            endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include('includes/footer.php');?>
        </div>
        <!-- End Right content -->
    </div>
    <!-- END wrapper -->

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
<?php } ?>
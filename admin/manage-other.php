<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
}
else{

if(isset($_GET['action']) && $_GET['action']=='del')
{
$otherid=intval($_GET['oid']);
$query=mysqli_query($con,"update other set is_active=0 where id='$otherid'");
if($query)
{
$msg="Record deleted ";
}
else{
$error="Something went wrong. Please try again.";    
} 
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
        <title>Newsportal | Manage Other Content</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manage Other Content</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Other Content</a>
                                        </li>
                                        <li class="active">
                                            Manage Other Content
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <?php if(isset($msg)) { ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                                            <?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if(isset($error)) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0">
                                            <thead>
                                                <tr>
                                                    <th>Related Post</th>
                                                    <th>Type</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query=mysqli_query($con,"SELECT o.id, o.created_at, p.PostTitle 
                                                                        FROM other o 
                                                                        JOIN tblposts p ON o.P_id = p.id 
                                                                        WHERE o.is_active=1");
                                                $rowcount=mysqli_num_rows($query);
                                                if($rowcount==0) {
                                                ?>
                                                <tr>
                                                    <td colspan="4" align="center"><h3 style="color:red">No records found</h3></td>
                                                <tr>
                                                <?php 
                                                } else {
                                                    while($row=mysqli_fetch_array($query)) {
                                                ?>
                                                <tr>
                                                    <td><b><?php echo htmlentities($row['PostTitle']);?></b></td>
                                                    <td>Other Content</td>
                                                    <td><?php echo htmlentities($row['created_at'])?></td>
                                                    <td>
                                                        <a href="edit-other.php?oid=<?php echo htmlentities($row['id']);?>">
                                                            <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                        </a> 
                                                    </td>
                                                </tr>
                                                <?php } }?>
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
<?php } ?>
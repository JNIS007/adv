<?php
include("./includes/config.php");
session_start();
if(strlen($_SESSION['login'])==0) { 
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Manage CMS Pages</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
    </head>

    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php');?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->

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
                                    <h4 class="page-title">Manage CMS Pages</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">CMS Pages</a>
                                        </li>
                                        <li class="active">
                                            Manage CMS Pages
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">  
                                <?php if(isset($_SESSION["msg"])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($_SESSION["msg"]);?>
                                </div>
                                <?php 
                                unset($_SESSION["msg"]);
                            } ?>

                                <?php if(isset($_SESSION["error"])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION["msg"]);?></div>
                                <?php 
                              unset($_SESSION["error"]);
                            } ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">
                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Page Name</th>
                                                    <th>Page Title</th>
                                                    <th>Description</th>
                                                    <th>Posted Date</th>
                                                    <th>Changed At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Pagination setup
                                                $results_per_page = 10;
                                                $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                                $offset = ($current_page - 1) * $results_per_page;
                                                
                                                // Get total number of records
                                                $total_query = mysqli_query($con, "SELECT COUNT(*) as total FROM cms");
                                                $total_row = mysqli_fetch_assoc($total_query);
                                                $total_pages = ceil($total_row['total'] / $results_per_page);
                                                
                                                // Get records for current page
                                                $sql = mysqli_query($con, "SELECT * FROM cms LIMIT $offset, $results_per_page");
                                                $cnt = $offset + 1;
                                                
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                    <td><?php echo htmlentities($row['PageName']);?></td>
                                                    <td><?php echo htmlentities($row['PageTitle']);?></td>
                                                    <td><?php echo substr(htmlentities($row['Description']), 0, 50) . '...';?></td>
                                                    <td><?php echo htmlentities($row['PostingDate']);?></td>
                                                    <td><?php echo htmlentities($row['UpdationDate']);?></td>
                                                    <td>
                                                        <a href="edit-cms.php?id=<?php echo htmlentities($row['id']);?>">
                                                            <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $cnt++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        
                                        <!-- Pagination -->
                                        <div class="text-center">
                                            <ul class="pagination">
                                                <?php if ($current_page > 1): ?>
                                                    <li><a href="?page=<?php echo $current_page - 1; ?>">Previous</a></li>
                                                <?php endif; ?>
                                                
                                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                    <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php endfor; ?>
                                                
                                                <?php if ($current_page < $total_pages): ?>
                                                    <li><a href="?page=<?php echo $current_page + 1; ?>">Next</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- end row -->
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
    </body>
</html>
<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['scid'])) {
        $id = intval($_GET['scid']);
        mysqli_query($con, "UPDATE tblsubcategory SET Is_Active = '0' WHERE SubCategoryId = '$id'");
        $msg = "Category deleted ";
    }

    if (isset($_GET['resid'])) {
        $id = intval($_GET['resid']);
        mysqli_query($con, "UPDATE tblsubcategory SET Is_Active = '1' WHERE SubCategoryId = '$id'");
        $msg = "Category restored successfully";
    }

    if (isset($_GET['action']) && $_GET['action'] == 'perdel' && isset($_GET['scid'])) {
        $id = intval($_GET['scid']);
        mysqli_query($con, "DELETE FROM tblsubcategory WHERE SubCategoryId = '$id'");
        $delmsg = "Category deleted forever";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>News | Manage SubCategories</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/core.css" rel="stylesheet" />
    <link href="assets/css/components.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet" />
    <link href="assets/css/pages.css" rel="stylesheet" />
    <link href="assets/css/menu.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">
    <div id="wrapper">
        <?php include('includes/topheader.php'); ?>
        <?php include('includes/leftsidebar.php'); ?>

        <div class="content-page">
            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Manage SubCategories</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">SubCategory</a></li>
                                    <li class="active">Manage SubCategories</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <?php if ($msg) { ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                </div>
                            <?php } ?>

                            <?php if ($delmsg) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap!</strong> <?php echo htmlentities($delmsg); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class="m-b-30">
                                    <a href="add-subcategory.php">
                                        <button id="addToTable" class="btn btn-success waves-effect waves-light">
                                            Add <i class="mdi mdi-plus-circle-outline"></i>
                                        </button>
                                    </a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Description</th>
                                                <th>Posting Date</th>
                                                <th>Last Update</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT tblcategory.CategoryName as catname, tblsubcategory.Subcategory as subcatname, tblsubcategory.SubCatDescription as SubCatDescription, tblsubcategory.PostingDate as subcatpostingdate, tblsubcategory.UpdationDate as subcatupdationdate, tblsubcategory.SubCategoryId as subcatid FROM tblsubcategory JOIN tblcategory ON tblsubcategory.CategoryId=tblcategory.id WHERE tblsubcategory.Is_Active=1");
                                            $cnt = 1;
                                            $rowcount = mysqli_num_rows($query);
                                            if ($rowcount == 0) {
                                            ?>
                                                <tr><td colspan="7" align="center"><h3 style="color:red">No record found</h3></td></tr>
                                            <?php
                                            } else {
                                                while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo htmlentities($row['catname']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatname']); ?></td>
                                                        <td><?php echo htmlentities($row['SubCatDescription']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatpostingdate']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatupdationdate']); ?></td>
                                                        <td>
                                                            <a href="edit-subcategory.php?scid=<?php echo htmlentities($row['subcatid']); ?>">
                                                                <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                            </a>
                                                            &nbsp;
                                                            <a href="manage-subcategories.php?scid=<?php echo htmlentities($row['subcatid']); ?>&action=del" onclick="return confirm('Are you sure you want to delete this subcategory?')">
                                                                <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Deleted Subcategories Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">
                                <div class="m-b-30">
                                    <h4><i class="fa fa-trash-o"></i> Deleted SubCategories</h4>
                                </div>

                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-danger">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Description</th>
                                                <th>Posting Date</th>
                                                <th>Last Update</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT tblcategory.CategoryName as catname, tblsubcategory.Subcategory as subcatname, tblsubcategory.SubCatDescription as SubCatDescription, tblsubcategory.PostingDate as subcatpostingdate, tblsubcategory.UpdationDate as subcatupdationdate, tblsubcategory.SubCategoryId as subcatid FROM tblsubcategory JOIN tblcategory ON tblsubcategory.CategoryId=tblcategory.id WHERE tblsubcategory.Is_Active=0");
                                            $cnt = 1;
                                            $rowcount = mysqli_num_rows($query);
                                            if ($rowcount == 0) {
                                            ?>
                                                <tr><td colspan="7" align="center"><h3 style="color:red">No record found</h3></td></tr>
                                            <?php
                                            } else {
                                                while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo htmlentities($row['catname']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatname']); ?></td>
                                                        <td><?php echo htmlentities($row['SubCatDescription']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatpostingdate']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatupdationdate']); ?></td>
                                                        <td>
                                                            <a href="manage-subcategories.php?resid=<?php echo htmlentities($row['subcatid']); ?>">
                                                                <i class="ion-arrow-return-right" title="Restore"></i>
                                                            </a>
                                                            &nbsp;
                                                            <a href="manage-subcategories.php?scid=<?php echo htmlentities($row['subcatid']); ?>&action=perdel" onclick="return confirm('Are you sure you want to permanently delete this subcategory?')">
                                                                <i class="fa fa-trash-o" style="color: #f05050" title="Delete Forever"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div> <!-- container -->
            </div> <!-- content -->
            <?php include('includes/footer.php'); ?>
        </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>
</html>
<?php } ?>

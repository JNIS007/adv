<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
    exit();
}

if(isset($_POST['submitsubcat'])) {
    $subcatid = intval($_GET['scid']);    
    $categoryid = intval($_POST['category']);
    $subcatname = mysqli_real_escape_string($con, $_POST['subcategory']);
    $subcatdescription = mysqli_real_escape_string($con, $_POST['sucatdescription']);
    
    $query = mysqli_query($con, "UPDATE tblsubcategory SET CategoryId='$categoryid', Subcategory='$subcatname', SubCatDescription='$subcatdescription' WHERE SubCategoryId='$subcatid'");
    
    if($query) {
        $msg = "Sub-Category updated successfully";
    } else {
        $error = "Something went wrong. Please try again.";    
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Newsportal | Edit Sub Category</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    
    <script src="assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php include('includes/topheader.php');?>
        <!-- Top Bar End -->

        <!-- Left Sidebar Start -->
        <?php include('includes/leftsidebar.php');?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Edit Sub-Category</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">Category</a></li>
                                    <li class="active">Edit Sub-Category</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Edit Sub-Category</b></h4>
                                <hr />

                                <div class="row">
                                    <div class="col-sm-6">  
                                        <?php if(isset($msg)) { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if(isset($error)) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php 
                                $subcatid = intval($_GET['scid']);
                                $query = mysqli_query($con, "SELECT tblcategory.CategoryName as catname, tblcategory.id as catid, 
                                        tblsubcategory.Subcategory as subcatname, tblsubcategory.SubCatDescription as SubCatDescription, 
                                        tblsubcategory.SubCategoryId as subcatid 
                                        FROM tblsubcategory 
                                        JOIN tblcategory ON tblsubcategory.CategoryId=tblcategory.id 
                                        WHERE tblsubcategory.Is_Active=1 AND SubCategoryId='$subcatid'");
                                while($row = mysqli_fetch_array($query)) {
                                ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <form class="form-horizontal" name="category" method="post">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Category</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="category" required>
                                                        <option value="<?php echo htmlentities($row['catid']); ?>"><?php echo htmlentities($row['catname']); ?></option>
                                                        <?php
                                                        $ret = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory WHERE Is_Active=1");
                                                        while($result = mysqli_fetch_array($ret)) {
                                                            echo '<option value="'.htmlentities($result['id']).'">'.htmlentities($result['CategoryName']).'</option>';
                                                        }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Sub-Category Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo htmlentities($row['subcatname']); ?>" name="subcategory" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Description</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="editor3" name="sucatdescription" required><?php echo htmlentities($row['SubCatDescription']); ?></textarea>
                                                    <script>
                                                        CKEDITOR.replace('editor3', {
                                                            toolbar: [
                                                                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
                                                                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
                                                                { name: 'links', items: [ 'Link', 'Unlink' ] },
                                                                { name: 'tools', items: [ 'Maximize' ] }
                                                            ],
                                                            height: 200
                                                        });
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">&nbsp;</label>
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('includes/footer.php');?>
        </div>
    </div>

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

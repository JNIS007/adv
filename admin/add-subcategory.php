<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
    exit();
}

if(isset($_POST['submitsubcat'])) {
    $categoryid = intval($_POST['category']);
    $subcatname = mysqli_real_escape_string($con, $_POST['subcategory']);
    $subcatdescription =  mysqli_real_escape_string($con, $_POST['sucatdescription']);
    $status = 1;
    
    $query = mysqli_query($con, "INSERT INTO tblsubcategory(CategoryId, Subcategory, SubCatDescription, Is_Active) 
            VALUES('$categoryid', '$subcatname', '$subcatdescription', '$status')");
    
    if($query) {
        $msg = "Sub-Category created successfully";
    } else {
        $error = "Something went wrong. Please try again.";    
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adventure | Add Sub-Category</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .cke_notifications_area{
            display: none !important;
        }
    </style>
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
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
    
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
                                <h4 class="page-title">Add Sub-Category</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">Category</a></li>
                                    <li class="active">Add Sub-Category</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"><b>Add Sub-Category</b></h4>
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

                                <div class="row">
                                    <div class="col-md-8">
                                        <form class="form-horizontal" name="category" method="post">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Category</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="category" required>
                                                        <option value="">Select Category</option>
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
                                                    <input type="text" class="form-control" name="subcategory" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Description</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="editor2" name="sucatdescription" required></textarea>
                                                    <script>
                                                        CKEDITOR.replace('editor2', {
                                                           toolbar: [
                                                                { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates'] },
                                                                { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                                                                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
                                                                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                                                                { name: 'colors', items: ['TextColor', 'BGColor'] },
                                                                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting'] },
                                                                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
                                                                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                                                                { name: 'tools', items: ['Maximize', 'ShowBlocks'] }
                                                            ],
                                                            height: 300
                                                        });
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">&nbsp;</label>
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submitsubcat">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

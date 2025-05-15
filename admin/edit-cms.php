<?php
session_start();
include('includes/config.php');

// Check if user is logged in
if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
    exit();
}

// Fetch existing data if ID is provided
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$pageData = null;

if($id > 0) {
    $query = mysqli_query($con, "SELECT * FROM cms WHERE id = '$id'");
    $pageData = mysqli_fetch_assoc($query);
    
    if(!$pageData) {
        $_SESSION['error'] = "Record not found!";
        header('location:Manage-All-CMS.php');
        exit();
    }
}

// Handle form submission
if(isset($_POST['submit'])) {
    $pageName = mysqli_real_escape_string($con, $_POST['pageName']);
    $pageTitle = mysqli_real_escape_string($con, $_POST['pageTitle']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
    // Initialize image path with existing value
    $imagePath = $pageData['ImageURL'] ?? '';
    
    // Handle file upload if a new file is provided
    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = 'uploads/' . basename($image);
        
        if(move_uploaded_file($image_tmp, $image_path)) {
            $imagePath = $image_path;
            
            // Delete old image if it exists
            if(!empty($pageData['ImageURL']) && file_exists($pageData['ImageURL'])) {
                unlink($pageData['ImageURL']);
            }
        } else {
            $_SESSION['error'] = "Image upload failed!";
            header("location:edit-cms.php?id=$id");
            exit();
        }
    }
    
    // Update record in database
    $updateQuery = "UPDATE cms SET 
                    PageName = '$pageName',
                    PageTitle = '$pageTitle',
                    Description = '$description',
                    ImageURL = '$imagePath',
                    UpdationDate = NOW()
                    WHERE id = '$id'";
    
    if(mysqli_query($con, $updateQuery)) {
        $_SESSION['msg'] = "CMS page updated successfully!";
        header("location:manage-All-CMS.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to update CMS page!";
        header("location:edit-cms.php?id=$id");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit CMS Page</title>
        <style>
            .cke_notifications_area {
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
        <script src="assets/js/modernizr.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
    </head>

    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->

            <!-- Left Sidebar Start -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit CMS Page</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#">CMS Pages</a></li>
                                        <li class="active">Edit CMS Page</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form method="POST" action="#" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="pageName">Page Name</label>
                                            <input type="text" class="form-control" id="pageName" name="pageName" 
                                                   value="<?php echo htmlspecialchars($pageData['PageName'] ?? ''); ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="pageTitle">Page Title</label>
                                            <input type="text" class="form-control" id="pageTitle" name="pageTitle" 
                                                   value="<?php echo htmlspecialchars($pageData['PageTitle'] ?? ''); ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" rows="10" cols="80">
                                                <?php echo htmlspecialchars($pageData['Description'] ?? ''); ?>
                                            </textarea>
                                            <script>
                                                CKEDITOR.replace('description', {
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
                                        
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                            <?php if(!empty($pageData['ImageURL'])): ?>
                                                <div class="mt-2">
                                                    <p>Current Image:</p>
                                                    <img src="<?php echo htmlspecialchars($pageData['ImageURL']); ?>" style="max-width: 200px; max-height: 200px;">
                                                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($pageData['ImageURL']); ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <a href="manage-cms.php" class="btn btn-default">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
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
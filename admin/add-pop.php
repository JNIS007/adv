<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
 
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
    <title>Adventure | Add Post</title>

    <!-- Summernote css -->
    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
    <script>
      function getSubCat(val) {
        $.ajax({
          type: "POST",
          url: "get_subcategory.php",
          data: 'catid=' + val,
          success: function(data) {
            $("#subcategory").html(data);
          }
        });
      }
    </script>
    <style>
      body {
        font-family: Arial;
      }

      .tabs {
        display: flex;
        background: #364050;
        justify-content: start;
        align-items: center;
        gap: 30px;
        padding: 20px;
      }

      .tab {
        margin-right: 15px;
        font-weight: bold;
        color:#818d9a;
        cursor: pointer;
      }

      .tab.active {
        background:#364050;
        color: white;
        font-weight: bold;
      }

      .tab:hover{
       color: white;
       font-weight: bold;
      }

      .tab-content {
        border: 1px solid #ccc;
        padding: 15px;
      }

      .submit-btn {
        background: #10a3b3;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        float: right;
        margin-top: 30px;
      }

      #addMoreBtn{
        margin-top: 30px;
      }
      
      /* Error message styling */
      .alert {
        margin: 15px 0;
        padding: 15px;
        border-radius: 4px;
      }
      .alert-success {
        background-color: #dff0d8;
        border-color: #d6e9c6;
        color: #3c763d;
      }
      .alert-danger {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
      }
    </style>
  </head>

  <body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

      <!-- Top Bar Start -->
      <?php include('includes/topheader.php'); ?>
      <!-- ========== Left Sidebar Start ========== -->
      <?php include('includes/leftsidebar.php'); ?>
      <!-- Left Sidebar End -->

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
  
            <!-- Success Message -->
            <?php if(isset($_SESSION["msg"])){ ?>
            <div class="alert alert-success" role="alert">
              <strong>Well done!</strong> <?php echo htmlentities($_SESSION["msg"]); ?>
            </div>
            <?php unset($_SESSION["msg"]); ?>
            <?php } ?>

            <!-- Error Message -->
            <?php if(isset($_SESSION["error"])){ ?>
            <div class="alert alert-danger" role="alert">
              <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION["error"]); ?>
            </div>
            <?php unset($_SESSION["error"]); ?>
            <?php } ?>

            <h4>Popular Advanture</h4>

            <form action="pop.php" method="POST" id="postForm">
                 <div class="card-box">
        
       <!-- Add this where you want the dropdown in your form -->
<div class="form-group mb-3">
    <label for="postTitle">Popular  Advanture:</label>
    <select class="form-control" name="related_post_id" id="postTitle" required>
        <option value="">-- Select Advanture --</option>
        <?php 
        $query = mysqli_query($con, "SELECT id, PostTitle FROM tblposts WHERE Is_Active = 1");
        while($row = mysqli_fetch_assoc($query)) {
            echo '<option value="'.$row['id'].'">'.htmlspecialchars($row['PostTitle']).'</option>';
        }
        ?>
    </select>
</div>

    </div>
    
              <button type="submit" name="submit" class="submit-btn">Submit</button>
            </form>
         
  </div> <!-- container -->
        </div> <!-- content -->

        <?php include('includes/footer.php'); ?>
      </div>
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
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

    <!--Summernote js-->
    <script src="../plugins/summernote/summernote.min.js"></script>
    <!-- Select 2 -->
    <script src="../plugins/select2/js/select2.min.js"></script>
    <!-- Jquery filer js -->
    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- page specific js -->
    <script src="assets/pages/jquery.blog-add.init.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

  </body>
  </html>
<?php } ?>
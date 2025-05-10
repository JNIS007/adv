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

            <h4>Other Posts</h4>

            <form action="save.php" method="POST" id="postForm">
              <div class="tabs">
                <div class="tab active" data-tab="ITINERARY">ITINERARY</div>
                <div class="tab" data-tab="USEFUL_INFORMATION">USEFUL INFORMATION</div>
                <div class="tab" data-tab="WHATS_INCLUDED">WHATS INCLUDED</div>
                <div class="tab" data-tab="FAQ">FAQ</div>
                <div class="tab" data-tab="RECOMMENDED_PACKAGE">RECOMMENDED PACKAGE</div>
                <div class="tab" data-tab="CHART">CHART</div>
                <div class="tab" data-tab="BELONGS">BELONGS TO</div>
              </div>

              <div class="tab-content" data-tab="ITINERARY">
                <div class="card-box">
                  <h4><b>Detailed Itinerary:</b></h4>
                  <div class="summernote-wrapper" style="display:none;">
                    <textarea class="summernote" name="It" required><?php 
                      echo isset($_SESSION['form_data']['It']) ? htmlspecialchars($_SESSION['form_data']['It']) : ''; 
                    ?></textarea>
                  </div>
                </div>
                <div class="card-box">
                  <h4><b>Important Note:</b></h4>
                  <div class="summernote-wrapper" style="display:none;">
                    <textarea class="summernote" name="Nt" required><?php 
                      echo isset($_SESSION['form_data']['Nt']) ? htmlspecialchars($_SESSION['form_data']['Nt']) : ''; 
                    ?></textarea>
                  </div>
                </div>
              </div>

              <div class="tab-content" data-tab="USEFUL_INFORMATION" style="display:none;">
                <div class="card-box">
                  <h4><b>Useful Information:</b></h4>
                  <textarea class="summernote" name="useful_info"><?php 
                    echo isset($_SESSION['form_data']['useful_info']) ? htmlspecialchars($_SESSION['form_data']['useful_info']) : ''; 
                  ?></textarea>
                </div>
              </div>

              <div class="tab-content" data-tab="WHATS_INCLUDED" style="display:none;">
                <div class="card-box">
                  <h4><b>What's Included:</b></h4>
                  <textarea class="summernote" name="whats_included"><?php 
                    echo isset($_SESSION['form_data']['whats_included']) ? htmlspecialchars($_SESSION['form_data']['whats_included']) : ''; 
                  ?></textarea>
                </div>
                <div class="card-box">
                  <h4><b>What's Excluded:</b></h4>
                  <textarea class="summernote" name="whats_Excluded"><?php 
                    echo isset($_SESSION['form_data']['whats_Excluded']) ? htmlspecialchars($_SESSION['form_data']['whats_Excluded']) : ''; 
                  ?></textarea>
                </div>
              </div>

              <div class="tab-content" data-tab="FAQ" style="display:none;">
                <div class="card-box">
                  <h4><b>FAQ:</b></h4>
                  <textarea class="summernote" name="faq"><?php 
                    echo isset($_SESSION['form_data']['faq']) ? htmlspecialchars($_SESSION['form_data']['faq']) : ''; 
                  ?></textarea>
                </div>
              </div>

              <div class="tab-content" data-tab="RECOMMENDED_PACKAGE" style="display:none;">
                <div class="card-box">
                  <h4><b>Recommended Package:</b></h4>
                  <textarea class="summernote" name="req"><?php 
                    echo isset($_SESSION['form_data']['req']) ? htmlspecialchars($_SESSION['form_data']['req']) : ''; 
                  ?></textarea>
                </div>
              </div>
              <div class="tab-content" data-tab="BELONGS" style="display:none;">
    <div class="card-box">
        <h4><b>Belongs To:</b></h4>
        
       <!-- Add this where you want the dropdown in your form -->
<div class="form-group mb-3">
    <label for="postTitle">Related Post:</label>
    <select class="form-control" name="related_post_id" id="postTitle" required>
        <option value="">-- Select Post --</option>
        <?php 
        $query = mysqli_query($con, "SELECT id, PostTitle FROM tblposts WHERE Is_Active = 1");
        while($row = mysqli_fetch_assoc($query)) {
            $selected = (isset($_SESSION['form_data']['related_post_id']) && $_SESSION['form_data']['related_post_id'] == $row['id']) ? 'selected' : '';
            echo '<option value="'.$row['id'].'" '.$selected.'>'.htmlspecialchars($row['PostTitle']).'</option>';
        }
        ?>
    </select>
</div>

    </div>
</div>
              
              <div class="tab-content" data-tab="CHART" style="display:none;">
                <div class="card-box">
                  <!-- Container for dynamic fields -->
                  <div id="dynamicFieldsContainer">
                    <?php
                    // Handle dynamic fields from session
                    if(isset($_SESSION['form_data']['itinerary_outline'])) {
                      for($i = 0; $i < count($_SESSION['form_data']['itinerary_outline']); $i++) {
                        echo '<div class="row field-group mt-3">';
                        echo '<div class="col-md-6">';
                        echo '<h4><b>Itinerary Outline:</b></h4>';
                        echo '<input type="text" class="form-control" name="itinerary_outline[]" value="'.htmlspecialchars($_SESSION['form_data']['itinerary_outline'][$i]).'" />';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<h4><b>Height in meter:</b></h4>';
                        echo '<input type="number" class="form-control" name="height_in_meter[]" step="0.01" value="'.htmlspecialchars($_SESSION['form_data']['height_in_meter'][$i] ?? '').'" />';
                        echo '</div>';
                        echo '</div>';
                      }
                    } else {
                      // Default first field
                      echo '<div class="row field-group">';
                      echo '<div class="col-md-6">';
                      echo '<h4><b>Itinerary Outline:</b></h4>';
                      echo '<input type="text" class="form-control" name="itinerary_outline[]" placeholder="e.g., Day 01" />';
                      echo '</div>';
                      echo '<div class="col-md-6">';
                      echo '<h4><b>Height in meter:</b></h4>';
                      echo '<input type="number" class="form-control" name="height_in_meter[]" step="0.01" placeholder="e.g., 185" />';
                      echo '</div>';
                      echo '</div>';
                    }
                    ?>
                  </div>

                  <!-- Add More Button -->
                  <button type="button" id="addMoreBtn" class="btn btn-primary mt-3">
                    Add Another
                  </button>
                </div>
              </div>

              <br>
              <button type="submit" name="submit" class="submit-btn">Submit</button>
            </form>

            <?php 
              // Clear form data from session after displaying
              if(isset($_SESSION['form_data'])) {
                unset($_SESSION['form_data']);
              }
            ?>

          </div> <!-- container -->
        </div> <!-- content -->

        <?php include('includes/footer.php'); ?>
      </div>
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <script>
      var resizefunc = [];
       
      // JavaScript to handle tab active class switching
      const tabs = document.querySelectorAll('.tab');
      tabs.forEach(tab => {
        tab.addEventListener('click', function() {
          tabs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');
        });
      });

      const tabButtons = document.querySelectorAll('.tab');
      const tabContents = document.querySelectorAll('.tab-content');

      tabButtons.forEach(tab => {
        tab.addEventListener('click', function () {
          const tabName = this.getAttribute('data-tab');
          tabButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');

          tabContents.forEach(content => {
            if (content.getAttribute('data-tab') === tabName) {
              content.style.display = 'block';
            } else {
              content.style.display = 'none';
            }
          });
        });
      });

      document.getElementById('addMoreBtn').addEventListener('click', function() {
        const container = document.getElementById('dynamicFieldsContainer');
        const newFieldGroup = document.createElement('div');
        newFieldGroup.className = 'row field-group mt-3';
        newFieldGroup.innerHTML = `
          <div class="col-md-6">
            <h4><b>Itinerary Outline:</b></h4>
            <input type="text" class="form-control" name="itinerary_outline[]" />
          </div>
          <div class="col-md-6">
            <h4><b>Height in meter:</b></h4>
            <input type="number" class="form-control" name="height_in_meter[]" step="0.01"/>
          </div>
        `;
        container.appendChild(newFieldGroup);
      });

      // Form validation
      document.getElementById('postForm').addEventListener('submit', function(e) {
        const requiredFields = document.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
          if (!field.value.trim()) {
            isValid = false;
            field.style.borderColor = 'red';
          } else {
            field.style.borderColor = '';
          }
        });
        
        if (!isValid) {
          e.preventDefault();
          alert('Please fill in all required fields');
        }
      });
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

    <script>
      jQuery(document).ready(function () {
        $('.summernote').summernote({
          height: 240,
          focus: false,
          callbacks: {
            onInit: function () {
              $('.summernote-wrapper').show();
            }
          }
        });

        // Initialize Select2
        $(".select2").select2();
        $(".select2-limiting").select2({ maximumSelectionLength: 2 });
        
        // Restore Summernote content from session
        <?php if(isset($_SESSION['form_data'])): ?>
          <?php foreach(['It', 'Nt', 'useful_info', 'whats_included', 'whats_Excluded', 'faq', 'req'] as $field): ?>
            <?php if(isset($_SESSION['form_data'][$field])): ?>
              $('[name="<?php echo $field; ?>"]').summernote('code', <?php echo json_encode($_SESSION['form_data'][$field]); ?>);
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      });
    </script>

  </body>
  </html>
<?php } ?>
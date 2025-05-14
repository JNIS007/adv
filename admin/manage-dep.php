<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
    exit();
}

// Handle delete
if(isset($_GET['action']) && $_GET['action']=='del') {
    $id = intval($_GET['id']);
    $query = mysqli_query($con,"DELETE FROM tblpostdetails WHERE id='$id'");
    $_SESSION['msg'] = $query ? "Departure deleted successfully." : "Error deleting departure.";
    header('location:manage-dep.php');
    exit();
}

// Handle enable/disable
if(isset($_GET['action']) && $_GET['action'] == 'toggle') {
    $id = intval($_GET['id']);
    $status = intval($_GET['status']);
    $new_status = $status ? 0 : 1; // Toggle status

    $query = mysqli_query($con, "UPDATE tblpostdetails SET is_active = '$new_status' WHERE id = '$id'");
    $_SESSION['msg'] = $query ? "Status updated." : "Failed to update status.";
    header('location:manage-dep.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Adventure | Manage Departures</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/core.css" rel="stylesheet" />
    <link href="assets/css/components.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet" />
    <link href="assets/css/menu.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
</head>
<body class="fixed-left">
<div id="wrapper">

<?php include('includes/topheader.php');?>
<?php include('includes/leftsidebar.php');?>

<div class="content-page">
    <div class="content">
        <div class="container">

            <!-- Success/Error Messages -->
            <?php if(isset($_SESSION["msg"])): ?>
                <div class="alert alert-success"><strong>Success:</strong> <?php echo htmlentities($_SESSION["msg"]); ?></div>
                <?php unset($_SESSION["msg"]); ?>
            <?php endif; ?>

            <?php if(isset($_SESSION["error"])): ?>
                <div class="alert alert-danger"><strong>Error:</strong> <?php echo htmlentities($_SESSION["error"]); ?></div>
                <?php unset($_SESSION["error"]); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Manage Departures</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li><a href="#">Admin</a></li>
                            <li class="active">Manage Departures</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <!-- Departure Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table table-colored table-centered table-inverse m-0">
                                <thead>
                                    <tr>
                                        <th>Adventure</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "
                                        SELECT d.*, p.PostTitle 
                                        FROM tblpostdetails d 
                                        LEFT JOIN tblposts p ON p.id = d.post_id
                                        ORDER BY d.id DESC
                                    ");

                                    if(mysqli_num_rows($query) == 0): ?>
                                        <tr><td colspan="6" align="center"><strong>No departures found.</strong></td></tr>
                                    <?php else:
                                        while($row = mysqli_fetch_array($query)): ?>
                                            <tr>
                                                <td><?php echo htmlentities($row['PostTitle']); ?></td>
                                                <td><?php echo htmlentities($row['start_date']); ?></td>
                                                <td><?php echo htmlentities($row['end_date']); ?></td>
                                                <td><?php echo htmlentities($row['cost_per_person']); ?></td>
                                                <td>
                                                    <a href="manage-departures.php?action=toggle&id=<?php echo $row['id']; ?>&status=<?php echo $row['is_active']; ?>" 
                                                       class="label <?php echo $row['is_active'] ? 'label-success' : 'label-default'; ?>">
                                                       <?php echo $row['is_active'] ? 'Enabled' : 'Disabled'; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="manage-dep.php?id=<?php echo $row['id']; ?>&action=del" 
                                                       onclick="return confirm('Are you sure you want to delete this departure?')">
                                                       <i class="fa fa-trash-o" style="color: red;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php endwhile; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container -->
    </div> <!-- content -->
    <?php include('includes/footer.php'); ?>
</div> <!-- content-page -->

</div> <!-- wrapper -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>
<script src="assets/js/jquery.app.js"></script>
</body>
</html>

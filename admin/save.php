<?php
session_start();
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validate required fields
        if (empty($_POST['It']) || empty($_POST['Nt'])) {
            throw new Exception("Detailed Itinerary and Important Note are required fields");
        }

        // Prepare data from all tabs
        $itinerary = strip_tags(mysqli_real_escape_string($con, $_POST['It']));
        $important_note = strip_tags(mysqli_real_escape_string($con, $_POST['Nt']));
        $useful_info = strip_tags(mysqli_real_escape_string($con, $_POST['useful_info'] ?? ''));
        $whats_included = strip_tags(mysqli_real_escape_string($con, $_POST['whats_included'] ?? ''));
        $whats_excluded = strip_tags(mysqli_real_escape_string($con, $_POST['whats_Excluded'] ?? ''));
        $faq = strip_tags(mysqli_real_escape_string($con, $_POST['faq'] ?? ''));
        $recommended_package = strip_tags(mysqli_real_escape_string($con, $_POST['req'] ?? ''));
        
        // Process dynamic fields from CHART tab
        $chart_data = [];
        if (!empty($_POST['itinerary_outline']) && is_array($_POST['itinerary_outline'])) {
            $itinerary_outlines = $_POST['itinerary_outline'];
            $heights = $_POST['height_in_meter'] ?? [];
            
            for ($i = 0; $i < count($itinerary_outlines); $i++) {
                if (!empty($itinerary_outlines[$i])) {
                    $chart_data[] = [
                        'outline' => mysqli_real_escape_string($con, $itinerary_outlines[$i]),
                        'height' => mysqli_real_escape_string($con, $heights[$i] ?? '')
                    ];
                }
            }
        }
        
        $chart_data_json = mysqli_real_escape_string($con, json_encode($chart_data));
        
        // Insert statement
        $sql = "INSERT INTO other (
            Detailed_Itinerary,
            Important_Note,
            Useful_Information,
            Inc,
            Exc,
            faq,
            Recommended_Package,
            chart_data,
            is_active,
            created_at
        ) VALUES (
            '$itinerary',
            '$important_note',
            '$useful_info',
            '$whats_included',
            '$whats_excluded',
            '$faq',
            '$recommended_package',
            '$chart_data_json',
            1,
            NOW()
        )";
        
        if (mysqli_query($con, $sql)) {
            $last_id = mysqli_insert_id($con);
            $_SESSION["msg"] = "Record created successfully. ID: " . $last_id;
        } else {
            throw new Exception("Database error: " . mysqli_error($con));
        }
        
    } catch (Exception $e) {
        $_SESSION["error"] = "Error: " . $e->getMessage();
        // Store form data in session to repopulate form
        $_SESSION['form_data'] = $_POST;
    } finally {
        header("Location: other-category.php");
        exit();
    }
}
?>
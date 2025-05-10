<?php
session_start();
include("./includes/config.php");

// Function to completely clean text content (strips tags and removes &nbsp;)
function clean_text_input($input, $con) {
    if (empty($input)) {
        return '';
    }
    
    // Decode HTML entities (converts &nbsp; to spaces)
    $clean = html_entity_decode($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    
    // Remove all HTML tags
    $clean = strip_tags($clean);
    
    // Replace multiple spaces/newlines with single space
    $clean = preg_replace('/\s+/', ' ', $clean);
    
    // Trim and escape for database
    return mysqli_real_escape_string($con, trim($clean));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validate required fields
        $required_fields = ['It', 'Nt', 'related_post_id'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                throw new Exception(ucfirst(str_replace('_', ' ', $field)) . " is a required field");
            }
        }

        // Validate and sanitize post ID
        $related_post_id = (int)$_POST['related_post_id'];
        if ($related_post_id <= 0) {
            throw new Exception("Invalid post ID");
        }

        // Verify post exists using prepared statement
        $stmt = $con->prepare("SELECT id FROM tblposts WHERE id = ? AND Is_Active = 1");
        $stmt->bind_param("i", $related_post_id);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows === 0) {
            throw new Exception("Selected post doesn't exist or is inactive");
        }
        $stmt->close();

        // Prepare all data with proper sanitization
        $fields = [
            'It' => 'itinerary',
            'Nt' => 'important_note',
            'useful_info' => 'useful_info',
            'whats_included' => 'whats_included',
            'whats_Excluded' => 'whats_excluded',
            'faq' => 'faq',
            'req' => 'recommended_package'
        ];

        $data = [];
        foreach ($fields as $post_key => $var_name) {
            $data[$var_name] = isset($_POST[$post_key]) ? 
                clean_text_input($_POST[$post_key], $con) : '';
        }

        // Process chart data with same cleaning
        $chart_data = [];
        if (!empty($_POST['itinerary_outline']) && is_array($_POST['itinerary_outline'])) {
            foreach ($_POST['itinerary_outline'] as $index => $outline) {
                if (!empty(trim($outline))) {
                    $height = $_POST['height_in_meter'][$index] ?? '';
                    $chart_data[] = [
                        'outline' => clean_text_input($outline, $con),
                        'height' => clean_text_input($height, $con)
                    ];
                }
            }
        }
        $chart_data_json = json_encode($chart_data);

        // Use prepared statement for the insert
        $stmt = $con->prepare("INSERT INTO other (
            Detailed_Itinerary,
            Important_Note,
            Useful_Information,
            Inc,
            Exc,
            faq,
            Recommended_Package,
            chart_data,
            is_active,
            created_at,
            P_id
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1, NOW(), ?)");

        $stmt->bind_param("ssssssssi",
            $data['itinerary'],
            $data['important_note'],
            $data['useful_info'],
            $data['whats_included'],
            $data['whats_excluded'],
            $data['faq'],
            $data['recommended_package'],
            $chart_data_json,
            $related_post_id
        );

        if ($stmt->execute()) {
            $last_id = $con->insert_id;
            $_SESSION["msg"] = "Record created successfully. ID: " . $last_id;
            
            // Optional: Update the related post
            // $update = $con->prepare("UPDATE tblposts SET other_id = ? WHERE id = ?");
            // $update->bind_param("ii", $last_id, $related_post_id);
            // $update->execute();
            // $update->close();
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        $_SESSION["error"] = "Error: " . $e->getMessage();
        $_SESSION['form_data'] = $_POST;
    } finally {
        header("Location: other-category.php");
        exit();
    }
}
?>
<?php
include("connection.php"); // Include your database connection

$response = []; // Initialize an empty response array

// Check if all necessary POST parameters are set
if(isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['unit']) && isset($_POST['price']) && isset($_POST['date_of_expiry']) && isset($_POST['available_inventory'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $unit = $_POST['unit'];
    $price = floatval($_POST['price']);
    $date_of_expiry = $_POST['date_of_expiry'];
    $available_inventory = $_POST['available_inventory'];

    // Check if a new image is provided
    if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Create the "uploads" directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Move the uploaded image to the target directory
        $image_upload_status = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        if ($image_upload_status) {
            $image_path = $target_file; // Save the updated image path to your database
        } else {
            $response = [
                'status' => 'error',
                'success' => false,
                'message' => 'Image upload failed.'
            ];
            echo json_encode($response);
            exit; // Exit the script
        }
    }

    // Build the update query
    if (isset($image_path)) {
        $sql = "UPDATE `product` SET 
            `product_name` = '$product_name', 
            `unit` = '$unit', 
            `price` = '$price', 
            `date_of_expiry` = '$date_of_expiry', 
            `available_inventory` = '$available_inventory', 
            `image` = '$image_path' 
            WHERE `id` = $product_id";
    } else {
        $sql = "UPDATE `product` SET 
            `product_name` = '$product_name', 
            `unit` = '$unit', 
            `price` = '$price', 
            `date_of_expiry` = '$date_of_expiry', 
            `available_inventory` = '$available_inventory'
            WHERE `id` = $product_id";
    }

    // Execute the update query
    if(mysqli_query($conn, $sql)){
        $response = [
            'status' => 'ok',
            'success' => true,
            'message' => 'Record updated successfully!'
        ];
        header('Location: index.php'); // Redirect to index.php after successful record update
        exit; // Exit the script
    } else {
        $response = [
            'status' => 'error',
            'success' => false,
            'message' => 'Record update failed: ' . mysqli_error($conn)
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'success' => false,
        'message' => 'Invalid request'
    ];
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
?>

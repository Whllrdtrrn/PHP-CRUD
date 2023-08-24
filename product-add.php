<?php
include("connection.php"); // Include your database connection

$response = []; // Initialize an empty response array

// Get input values from the form
$product_name = $_POST['product_name'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$date_of_expiry = $_POST['date_of_expiry'];
$available_inventory = $_POST['available_inventory'];

// Image Upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Check if the "uploads" directory exists, create if not
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$image_upload_status = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

if ($image_upload_status) {
    $image_path = $target_file; // Save the image path to your database

    // SQL query to insert data into the database
    $sql = "INSERT INTO `product` (`product_name`, `unit`, `price`, `date_of_expiry`, `available_inventory`, `image`) VALUES ('$product_name', '$unit', '$price', '$date_of_expiry', '$available_inventory', '$image_path')";

    if (mysqli_query($conn, $sql)) {
        $response = [
            'status' => 'ok',
            'success' => true,
            'message' => 'Record created successfully!'
        ];

        // Redirect to index.php after successful record creation
        header('Location: index.php');
        exit;
    } else {
        $response = [
            'status' => 'error',
            'success' => false,
            'message' => 'Record creation failed: ' . mysqli_error($conn)
        ];
    }
} else {
    $response = [
        'status' => 'error',
        'success' => false,
        'message' => 'Image upload failed.'
    ];
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>

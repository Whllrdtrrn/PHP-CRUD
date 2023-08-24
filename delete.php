<!-- delete.php -->
<?php
include("connection.php"); // Include your database connection

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete query
    $sql = "DELETE FROM `product` WHERE `id` = $id";

    if(mysqli_query($conn, $sql)){
        $response = [
            'status' => 'ok',
            'success' => true,
            'message' => 'Product deleted successfully!'
        ];
        print_r(json_encode($response));
    } else {
        $response = [
            'status' => 'error',
            'success' => false,
            'message' => 'Product deletion failed: ' . mysqli_error($conn)
        ];
        print_r(json_encode($response));
    }
} else {
    $response = [
        'status' => 'error',
        'success' => false,
        'message' => 'Invalid request'
    ];
    print_r(json_encode($response));
}

// Close the database connection
mysqli_close($conn);
?>

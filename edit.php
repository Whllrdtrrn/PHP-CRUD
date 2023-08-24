<?php
// get-product.php
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch the product data based on the product ID and return it as JSON
    // Replace this with your actual database query
    $productData = array(
        'id' => $product_id,
        'product_name' => 'Product Name',
        'unit' => 'Unit',
        'price' => 'Price',
        'date_of_expiry' => 'Date of Expiry',
        'available_inventory' => 'Available Inventory'
    );

    echo json_encode($productData);
}
?>

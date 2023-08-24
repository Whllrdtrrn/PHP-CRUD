<?php
       include("connection.php"); 
    
       // Calculate total number of items
       $sqlTotalItems = "SELECT COUNT(*) AS total FROM `product`";
       $resultTotalItems = mysqli_query($conn, $sqlTotalItems);
       $rowTotalItems = mysqli_fetch_assoc($resultTotalItems);
       $totalItems = $rowTotalItems['total'];
       
       // Calculate pagination parameters
       $page = $_GET['page'] ?? 1;
       $itemsPerPage = 5;
       $totalPages = ceil($totalItems / $itemsPerPage);
       $offset = ($page - 1) * $itemsPerPage;
       
       // Fetch items for the current page
       $sql = "SELECT * FROM `product` LIMIT $offset, $itemsPerPage"; 
       $result = mysqli_query($conn, $sql); 
       $data = [];
       while ($fetch = mysqli_fetch_assoc($result)){
           $data[] = $fetch;
       }
       
       $response = [
           'totalPages' => $totalPages,
           'data' => $data
       ];
       
       echo json_encode($response);
   
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!--Link CSS-->
    <link rel="stylesheet" href="css/index.css">
    <!--CDN Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--CDN Font Awosome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .oswald {
        font-family: 'Oswald', sans-serif;

    }    
    
    .roboto {
        font-family: 'roboto', sans-serif;
    }
    
 
    .pagination {
        display: flex;
        justify-content: space-between;
    }
    </style>

</head>
<body>
        <div class="container">
            <div class="main">
            <h1 class="oswald mt-3" style="color: white;">PHP CRUD - Torreno</h1>
                <div class="card">
                    <div class="card-header">
                        <h3 class="oswald">Product List</h3>
                        <button type="button" class="oswald btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                Add New Product
                        </button>
                    </div>
                    <div style="overflow-x:auto;">
                    <table class=" table table-striped table-hover ">
                        <thead class="oswald text-uppercase">
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Date of Expiry</th>
                            <th>Available Inventory</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="product_data" class="roboto text-capitalize">
                        </tbody>
                        
                    </table>
                    </div>

                    <div class="card-footer text-muted">
                    <div class="pagination">
                        <button class="oswald btn btn-secondary" id="prevBtn">Previous</button>
                        <button class="oswald btn btn-secondary" id="nextBtn">Next</button>
                    </div>
                    </div>
                    <p class="loading oswald">Loading Data</p>
                </div>
            </div>
        <!-- Modal Add -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog oswald">
            <form action="product-add.php" method="post" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                   
                    <div class="modal-body addProduct">
                        <div class="mb-3">
                            <label for="name_input" class="form-label">Product Name:</label>
                            <input type="text" class="form-control roboto" name="product_name" id="name_input" required >
                        </div>
                        <div class="mb-3">
                            <label for="unit_input" class="form-label">Unit:</label>
                            <input type="text" class="form-control roboto" name="unit" id="unit_input" required >
                        </div>
                        <div class="mb-3">
                            <label for="price_input" class="form-label">Price:</label>
                            <input type="number" class="form-control roboto" name="price" id="price_input" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_exp_input" class="form-label">Date of Expiry:</label>
                            <input type="date" class="form-control roboto" name="date_of_expiry" id="date_exp_input" required>
                        </div>
                        <div class="mb-3">
                            <label for="available_inv_input" class="form-label">Available Inventory:</label>
                            <input type="number" class="form-control roboto" name="available_inventory" id="available_inv_input" required>
                        </div>

                        <div class="mb-3">
                            <label for="formFileSm_input" class="form-label">Image:</label>
                            <input class="form-control form-control-sm roboto" required accept="images/*" id="formFileSm_input" name="image" type="file">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- End Modal Add -->
         <!-- Modal Edit -->
         <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModal" aria-hidden="true">
            <div class="modal-dialog oswald">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabelEdit">Edit Product</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body edit_product">
                        <div class="mb-3">
                                <label for="name_input" class="form-label">Product Name:</label>
                                <input type="text" class="form-control roboto" name="product_name" id="name_input" required >
                            </div>
                            <div class="mb-3">
                                <label for="unit_input" class="form-label">Unit:</label>
                                <input type="text" class="form-control roboto" name="unit" id="unit_input" required >
                            </div>
                            <div class="mb-3">
                                <label for="price_input" class="form-label">Price:</label>
                                <input type="text" class="form-control roboto" name="price" id="price_input" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="date_exp_input" class="form-label">Date of Expiry:</label>
                                <input type="date" class="form-control roboto" name="date_of_expiry" id="date_exp_input" required>
                            </div>
                            <div class="mb-3">
                                <label for="available_inv_input" class="form-label">Available Inventory:</label>
                                <input type="number" class="form-control roboto" name="available_inventory" id="available_inv_input" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="formFileSm_input" class="form-label">Image:</label>
                                <input class="form-control form-control-sm roboto" accept="images/*" id="formFileSm_input" name="image" type="file">
                            </div>
                            <input type="hidden" id="product_id" name="product_id" class="form-control" >

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal Edit -->
    </div>

    <!--script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script>  
    
    
    var totalPages = 0;
          $(document).ready(function () {
            $('#prevBtn').click(function () {
                if (currentPage > 1) {
                    currentPage--;
                    loadPage(currentPage);
                    productList(currentPage)

                }
            });

            $('#nextBtn').click(function () {
                if (currentPage < totalPages) {
                    currentPage++;
                    loadPage(currentPage);
                    productList(currentPage)

                    
                }
            });
     
        });

   
        
        function productList(page = 1) {
            $.ajax({
            type: 'get',
            url: "product-list.php",
            data: { page: page },
            success: function (data) {
            var response = JSON.parse(data);
            totalPages = response.totalPages; // Update totalPages
            console.log(response)
            if (totalPages < 2) {
                $('.pagination').hide();
            } else {
                $('.pagination').show();
            }
            var tr = '';
            for (var i = 0; i < response.data.length; i++) {
                    var ids = response.data[i].id;
                    var names = response.data[i].product_name;
                    var units = response.data[i].unit;
                    var prices = response.data[i].price;
                    var date_exps = response.data[i].date_of_expiry;
                    var available_invs = response.data[i].available_inventory;
                    var formFileSms = response.data[i].image;
                    var date_exps_formatted = new Date(date_exps).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                    tr += '<tr>';
                    //tr += '<td><img src="' + formFileSms + '"/></td>';
                    tr += '<td>' + ids + '</td>';
                    tr += '<td>' + names + '</td>';
                    tr += '<td>' + units + '</td>';
                    tr += '<td> PHP ' + prices + '</td>';
                    tr += '<td>' + date_exps_formatted + '</td>';
                    tr += '<td>' + available_invs + '</td>';
                    tr += '<td><img src="' + formFileSms + '" alt="' + names + '" width="100"></td>';
                    tr += '<td><div class="d-flex">';
                    tr += '<a type="button" class="m-1 edit" data-bs-toggle="modal" data-bs-target="#editProductModal" onclick=getId(' + JSON.stringify(response.data[i]) + ')><i class="fa-solid fa-pen-to-square" style="color:green;"></i></a>';
                    tr += '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick="deleteProduct(' + ids + ')"><i class="fa-solid fa-trash" style="color:red;"></i></a>';
                    tr += '</div></td>';
                    tr += '</tr>';
                }
                    $('.loading').hide();
                    $('#product_data').html(tr);

                }
          
            
            });
        }
        var currentPage = 1;

        function loadPage(page) {
            //productList(page);
            $.ajax({
                    type: 'get',
                    url: "product-list.php",
                    data: { page: page },
                    success: function (data) {
                        var response = JSON.parse(data);
                        var tr = '';
                        // ... Your existing table row creation code
                        $('.loading').hide();
                        $('#product_data').html(tr);

                        // Enable/disable "Previous" and "Next" buttons based on the current page
                        $('#prevBtn').prop('disabled', page === 1);
                        $('#nextBtn').prop('disabled', page === totalPages);
                    }
                });
        }

        function goToPage(page) {
            currentPage = page;
            loadPage(currentPage);
            productList(currentPage)
        }

        // Initialize and load the initial page
        $(document).ready(function () {
            loadPage(currentPage);
            productList(currentPage)
        }); 
        function deleteProduct(id) {
        if (confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                type: 'POST',
                url: "delete.php", // Create a new PHP script to handle deletion
                data: { id: id },
                success: function(response) {
                    alert("Successfully Deleted");
                    productList(); // Refresh the product list after deletion
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        }
    }

      
        function getId(rowData) {
            // Populate the modal fields with the provided data
            $('.edit_product #name_input').val(rowData.product_name);
            $('.edit_product #unit_input').val(rowData.unit);
            $('.edit_product #price_input').val(rowData.price);
            $('.edit_product #date_exp_input').val(rowData.date_of_expiry);
            $('.edit_product #available_inv_input').val(rowData.available_inventory);
            $('.edit_product #product_id').val(rowData.id);

            // Make an AJAX request to fetch additional data
            $.ajax({
                type: 'GET',
                url: "edit.php", // Create a new PHP script to retrieve the product data
                data: rowData,
                success: function(response) {
                    // Process the response, if needed
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        }
        
        function updateProduct() {
            var product_id = $('.edit_product #product_id').val();
            var product_name = $('.edit_product #name_input').val();
            var unit = $('.edit_product #unit_input').val();
            var price = $('.edit_product #price_input').val();
            var date_exp = $('.edit_product #date_exp_input').val();
            var available_inv = $('.edit_product #available_inv_input').val();
            var formFileSm = $('.edit_product #formFileSm_input')[0].files[0]; // Get the selected image file
            
            // Create a FormData object to send form data including files
            var formData = new FormData();
            formData.append('product_id', product_id);
            formData.append('product_name', product_name);
            formData.append('unit', unit);
            formData.append('price', price);
            formData.append('date_of_expiry', date_exp);
            formData.append('available_inventory', available_inv);
            formData.append('image', formFileSm);
            
            // Perform the AJAX request
            $.ajax({
                type: 'POST',
                data: formData,
                url: "update.php",
                contentType: false, // Important for sending files
                processData: false, // Important for sending files
                success: function (data) {
                    try {
                        var response = JSON.parse(data);
                        $('#editProductModal').modal('hide');
                        productList();
                        alert(response.message);
                    } catch (error) {
                        console.error("Error parsing JSON response:", error);
                        console.log("Raw response:", data); // Log the raw response
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        }

        function addProductSubmit() {
                // Get input values from the form
                var product_name = $('#name_input').val();
                var unit = $('#unit_input').val();
                var price = $('#price_input').val();
                var date_exp = $('#date_exp_input').val();
                var available_inv = $('#available_inv_input').val();
                
                // Get the selected image file
                var imageFile = $('#formFileSm_input')[0].files[0];
                
                // Create a FormData object to send form data including files
                var formData = new FormData();
                formData.append('product_name', product_name);
                formData.append('unit', unit);
                formData.append('price', price);
                formData.append('date_of_expiry', date_exp);
                formData.append('available_inventory', available_inv);
                formData.append('image', imageFile);

                // Perform the AJAX request
                $.ajax({
                    type: 'POST',
                    data: formData,
                    url: "product-add.php",
                    contentType: false, // Important for sending files
                    processData: false, // Important for sending files
                    success: function (data) {
                        try {
                            var response = JSON.parse(data);
                            $('#addProductModal').modal('hide');
                            productList();
                            alert(response.message);
                            
                            // Reset form data
                            $('#name_input').val('');
                            $('#unit_input').val('');
                            $('#price_input').val('');
                            $('#date_exp_input').val('');
                            $('#available_inv_input').val('');
                            $('#formFileSm_input').val('');
                            
                
                        } catch (error) {
                            console.error("Error parsing JSON response:", error);
                            console.log("Raw response:", data); // Log the raw response
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            }


    </script>
</body>
</html>
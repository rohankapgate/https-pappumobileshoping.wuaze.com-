<?php
include('functions/userfunction.php');
include('includes/header.php');

// Fetch active products
$product_data = getAllActive("products");  
$products = [];
while ($product = mysqli_fetch_assoc($product_data)) {
    $products[] = $product;
}

// Encode the products array into JSON
$products_json = json_encode($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Product Searching</title>
    
    <style>
       /* Product Grid */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
}

/* Product Item */
.product-grid .product-item {
    width: 230px; /* Fixed width */
    padding-top: 40px;
}

/* Product Card */
.product-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    height: 320px; /* Fixed height for uniform structure */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Product Image */
.product-card img {
    width: 100%;
    height: 150px; /* Fixed height for images */
    object-fit: contain; /* Prevents cropping */
    border-radius: 5px;
}

/* Product Name */
.product-card h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

/* Product Description */
.product-card p {
    font-size: 0.9rem;
    color: #555;
    flex-grow: 1; /* Pushes button to bottom */
}

/* Read More Button */
.product-card .btn {
    width: 100%;
    background-color: blue;
    color: white;
    border-radius: 5px;
}


        /* Responsive Design */
        @media (max-width: 991px) { 
            .product-grid .product-item { width: 32%; } /* 3 per row on tablets */
        }
        @media (max-width: 769px) { 
            .product-grid .product-item { width: 24%; }
            .product-grid {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 7px;
                        justify-content: center; 
                    } /* 4 per row on mobile */
        }
        @media (max-width: 480px) { 
            .product-grid .product-item { width: 40%; } /* 2 per row on small mobiles */
        }
    </style>
</head>
<body>

    <h2 class="text-center mt-2">Product Searching</h2>
    <input type="text" class="form-control mt-3 mx-auto" id="myinput" placeholder="Live searching..." style="width:30%;">

    <div class="container mb-5">
        <h3 class="text-danger mt-5 text-center" id="para" style="display: none;">Not Found</h3>
        <div class="product-grid" id="notfound">
            <!-- Products will be loaded here -->
        </div>
    </div>

    <script>
        // Retrieve products from PHP
        const products = <?php echo $products_json; ?>;

        // Function to display products
                function showProducts(filteredProducts) {
            const container = document.getElementById("notfound");
            container.innerHTML = '';
            filteredProducts.forEach(product => {
                container.innerHTML += `
                    <div class="product-item">
                        <div class="product-card">
                            <h4>${product.name}</h4>
                            <img src="uploads/${product.image}" alt="${product.name}">
                            <p>${product.small_description}</p>
                            <a href="product-views.php?slug=${product.slug}" class="btn btn-primary btn-sm w-100">Read More</a>
                        </div>
                    </div>
                `;
            });
        }


        // Show all products initially
        showProducts(products);

        // Live search function
        document.getElementById("myinput").addEventListener("keyup", function() {
            let query = this.value.toLowerCase();
            let filteredProducts = products.filter(product => 
                product.name.toLowerCase().includes(query) || 
                product.small_description.toLowerCase().includes(query)
            );

            if (filteredProducts.length > 0) {
                showProducts(filteredProducts);
                document.getElementById("para").style.display = 'none';
            } else {
                document.getElementById("para").style.display = 'block';
                document.getElementById("notfound").innerHTML = '';
            }
        });
    </script>

</body>
</html>

<?php include('includes/footer.php'); ?>

<?php 
include_once 'includes/autoloader.inc.php';
$view = new ProductsView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="assets\css\styles.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- js -->
    <script src="assets/js/ScndFormAction.js" defer></script>
    <script src="assets/js/MasterCheckbox.js" defer></script>
    <title>Products</title>
</head>
<body>
<div class="container-fluid">
    <h1>Product List</h1>
    <hr class="my-4">
<form name="form2" onsubmit="return setFormActionForDeleteForm();" method="post">
        <!-- Display products -->
        <div class="row product-container">
            <div class="col-md-4">
                <div class="product-type" data-controller="classes/DVDController.class.php">
                    <?php $view->displayProductsByType('DVD'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-type" data-controller="classes/BookController.class.php">
                    <?php $view->displayProductsByType('Book'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-type" data-controller="classes/FurnitureController.class.php">
                    <?php $view->displayProductsByType('Furniture'); ?>
                </div>
            </div>
        </div>

        <!-- Action buttons -->
        <div class="row position-absolute top-0 end-0 mt-3">
            <div class="col-md-12 text-end">
                <label for="select-all-checkbox">Select All</label>
                <input class="form-check-input checkbox-item" type="checkbox" id="deleteCheckbox">
                <a class="btn btn-success" href="addProducts.php">ADD</a>
                <button id="delete-product-btn" class="btn btn-danger" type="submit" name="delete-product-btn">MASS DELETE</button>
            </div>
        </div>
    </div>
</form>
      <!-- Footer -->
      <div class="footer p-3 text-center mt-4">
      <hr class="my-4">
        <p>Scandiweb Test Assignment</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
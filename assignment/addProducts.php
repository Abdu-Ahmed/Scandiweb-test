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
    <!-- classless CSS -->
    <link rel="stylesheet" href="https://classless.de/classless.css">
      <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- js -->
    <script src="assets/js/FormAction.js" defer></script>
    <script src="assets/js/FormValidation.js" defer></script>
    <script src="assets/js/DDHandler.js" defer></script>
    <title>Add Products</title>
</head>
<body>
    <!-- submitting products form -->
    <h1>Add Product:</h1>
     <hr class="my-4">
    <?php $view->skuExists(); ?>
    <form id="product_form" name="form1" onsubmit="return actionOnSubmit();" method="post">
        <div for="prdctattr" class="prdctattr">
            SKU:
            <input id="sku" name="sku" type="" placeholder="Enter Unique SKU">
            Name:
            <input id="name" name="name" type="" placeholder="Name">
            Price:
            <input id="price" name="price" type="number" placeholder="Price">
        </div>
        <select id="productType">
            <option id="default" name="default" selected>Please Select Product.</option>
            <option id="dvd" name="dvd" value="dvd" data-fields="dvdfield" data-controller="classes\DVDController.class.php">DVD</option>
            <option id="furniture" name="furniture" value="furniture" data-fields="furniturefield" data-controller="classes\FurnitureController.class.php">Furniture</option>
            <option id="book" name="book" value="book" data-fields="bookfield" data-controller="classes\BookController.class.php">Book</option>
        </select>
        <br>
        <label for="dvdfield" id="dvdfield" style="display: none;">Please provide DVD Size:
            <input id="size" name="size" type="number" placeholder="Size (MB)">
        </label>
        <label for="furniturefield" id="furniturefield"  style="display: none;">Please provide dimensions:
            <input id="height" name="height" type="number" placeholder="Height (CM)">
            <input id="width" name="width" type="number" placeholder="Width (CM)">
            <input id="length" name="length" type="number" placeholder="Length (CM)">
        </label>
        <label for="bookfield" id="bookfield" style="display: none;">Please provide weight:
            <input id="weight" name="weight" type="number" placeholder="Weight (KG)">
        </label>
        <button id="submit" class="add btn btn-primary" type="submit" name="submit">Save</button>
        <a href="index.php" class="btn btn-light" >Cancel</a>
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

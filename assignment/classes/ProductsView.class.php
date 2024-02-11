<?php 
include_once 'ProductsModel.class.php';
class ProductsView extends ProductsModel {
    // checking if sku exists and displaying the notification that the product exists
    public function skuExists() {
        if (isset($_GET['itemExists'])) {
            echo '<script>alert("Product already exists!");</script>';    
        }
    }
// a multidimensional associative array that pairs each product with its specific attributes  
    private $productTypes = [
        'DVD' => ['size'],
        'Book' => ['weight'],
        'Furniture' => ['height', 'width', 'length']
    ];

    public function displayProductsByType($type) {
        $products = $this->getProducts();

        $filteredProducts = array_filter($products, function ($product) use ($type) {
            return $this->isProductType($product, $type);
        });

        array_map(function ($product) use ($type) {
            $this->displayProduct($product, $type);
        }, $filteredProducts);
    }

    private function isProductType($product, $type) {
        return isset($this->productTypes[$type]) &&
               array_reduce($this->productTypes[$type], function ($carry, $field) use ($product) {
                   return $carry && isset($product[$field]);
               }, true);
    }
    private function displayProduct($product, $type) {
        echo "<div class='col-md-4 product-container'>" .
        "<div class='card text-center'>" .
        "<h3 class='card-header prdctsku'>" . $product['sku'] .
        "<input class='check-delete form-check-input position-absolute top-0 start-0 delete-checkbox' type='checkbox' name='slctprdct[]' value='" . $product['id'] . "'>";
        $displayMethod = 'display' . $type . 'Product';
        $this->{$displayMethod}($product);
        
        echo '</div></div>';
    }
    
    private function displayDVDProduct($product) {
        echo '<div class="card-body">' .
             '<p class="card-title prdctname">' . $product['name'] . '</p>
              <p class="card-text prdctprice">$' . $product['price'] . '</p>
              <p class="card-text prdctsize">Size:' . $product['size'] . ' MB' . '</p>' .
             '</div>';
    }
    
    private function displayBookProduct($product) {
        echo '<div class="card-body">' .
             '<p class="card-title prdctname">' . $product['name'] . '</p>
              <p class="card-text prdctprice">$' . $product['price'] . '</p>
              <p class="card-text prdctweight">Weight:' . $product['weight'] .' KG' . '</p>' .
             '</div>';
    }
    
    private function displayFurnitureProduct($product) {
        echo '<div class="card-body">' .
             '<p class="card-title prdctname">' . $product['name'] . '</p>
              <p class="card-text prdctprice">$' . $product['price'] . '</p>
              <p class="card-text prdctdimensions">Dimensions:' . $product['height'] . 'x' . $product['width'] . 'x' . $product['length'] . '</p>' .
             '</div>';
    }
    
}
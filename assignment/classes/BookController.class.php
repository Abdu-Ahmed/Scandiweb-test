<?php
include_once 'ProductsModel.class.php';
include_once 'ProductsInterface.php';

class BookController extends ProductsModel implements ProductsInterface {
    
   
    private $sku;
    private $name;
    private $price;
    private $weight;
    public function getsku() {
        return $this->sku;
    }

    public function setsku($sku) {
        $this->sku = $sku;
    }

    public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }

    public function getprice() {
        return $this->price;
    }

    public function setprice($price) {
        $this->price = $price;
    }


    public function addNewBook($sku, $name, $price, $weight)
    {
       parent::addProduct($sku, $name, $price, null, null, null, null, $weight);
    }

    public function processForm()
    {
        if (isset($_POST['submit'])) {
            $sku = parent::formVal($_POST['sku']);
            $name = parent::formVal($_POST['name']);
            $price = parent::formVal($_POST['price']);
            $weight = parent::formVal($_POST['weight']);

            if (!parent::checkSku($sku)) {
                header("location:../addProducts.php?itemExists");

            } else {
                $this->addNewBook($sku, $name, $price, $weight);
                header("location:../index.php?productAdded");
                exit();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete-product-btn'])) {
            if (isset($_POST['slctprdct']) && is_array($_POST['slctprdct'])) {
                foreach ($_POST['slctprdct'] as $id) {
                    parent::deleteProduct($id);
                }
            }
            header("location:../index.php?productsDeleted");
            exit();
        }
    }
}


$controller = new BookController();
$controller->processForm();
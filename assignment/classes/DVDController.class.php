<?php
include_once 'ProductsModel.class.php';
include_once 'ProductsInterface.php';

class DVDController extends ProductsModel implements ProductsInterface {
    private $size;
    private $sku;
    private $name;
    private $price;

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

    public function addNewDVD($sku, $name, $price, $size) {
        parent::addProduct($sku, $name, $price, null, null, null, $size, null);
    }

    public function processForm() {
        if (isset($_POST['submit'])) {
            $sku = parent::formVal($_POST['sku']);
            $name = parent::formVal($_POST['name']);
            $price = parent::formVal($_POST['price']);
            $size = parent::formVal($_POST['size']);
           
            if (!parent::checkSku($sku)) {
                header("location:../addProducts.php?itemExists");

            } else {
                $this->addNewDVD($sku, $name, $price, $size);
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

$controller = new DVDController();
$controller->processForm();
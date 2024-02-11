<?php
include_once 'ProductsModel.class.php';
include_once 'ProductsInterface.php';

class FurnitureController extends ProductsModel implements ProductsInterface
{
    private $sku;
    private $name;
    private $price;
    private $height;
    private $width;
    private $length;


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


    public function addNewFurniture($sku, $name, $price, $height, $width, $length)
    {
        parent::addProduct($sku, $name, $price, $height, $width, $length, null, null);
    }

    public function processForm()
    {
        if (isset($_POST['submit'])) {
            $sku = parent::formVal($_POST['sku']);
            $name = parent::formVal($_POST['name']);
            $price = parent::formVal($_POST['price']);
            $height = parent::formVal($_POST['height']);
            $width = parent::formVal($_POST['width']);
            $length = parent::formVal($_POST['length']);

            if (!parent::checkSku($sku)) {
                header("location:../addProducts.php?itemExists");

            } else {
                $this->addNewFurniture($sku, $name, $price, $height, $width, $length);
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

$controller = new FurnitureController();
$controller->processForm();
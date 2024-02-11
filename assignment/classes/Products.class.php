<?php
// base abstract class
abstract class Products implements ProductsInterface {
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
    public function __construct($sku, $name, $price) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

}

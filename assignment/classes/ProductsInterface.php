<?php
// interface for the base abstract class and product specific classes (polymorphism)
interface ProductsInterface {
    public function getsku();
    public function setsku($sku);
    public function getname();
    public function setname($name);
    public function getprice();
    public function setprice($price);
}
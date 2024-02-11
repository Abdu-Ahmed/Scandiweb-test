<?php

include_once 'dbh.class.php';

class ProductsModel extends dbh
{
    // method to get all products from db (ordered by their id)
    protected function getProducts()
    {
        $sql = 'SELECT * FROM products ORDER BY id ASC;';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // method to check if sku exists(mentioned in view class)
    protected function checkSku($sku)
    {
        $sql = 'SELECT * FROM products WHERE sku = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);

        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }
// method to insert new product into db
    protected function addProduct($sku, $name, $price, $height, $width, $length, $size, $weight)
    {
        
        $sql = 'INSERT INTO products(sku, name, price, height, width, length, size, weight) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku, $name, $price, $height, $width, $length, $size, $weight]);
    }
    // method to delete a product using the checkbox and the mass delete button
    protected function deleteProduct($id)
    {
        $sql = 'DELETE FROM products WHERE id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
        // validating inserted data to prevent any injection attacks
    protected function formVal($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
<?php 

namespace App\Controller;

class ProductController{

    public function getProduct($id){
        echo "get Product";
        print_r($id);
    }

    public function addProduct(){
        echo "Add Product";
    }

    public function removeProduct($id){
        echo "remove Product";
        print_r($id);
    }

    public function updateProduct($id){
        echo "Update Product";
        print_r($id);
    }

    public function listAllProduct(){
        echo "List All Product";
    }

    public function consumirApi(){
        echo "consumir Product";
    }
}
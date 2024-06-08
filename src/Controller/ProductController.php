<?php 

namespace App\Controller;

use App\DAO\ProductDAO;
use App\Http\Request;
use App\Http\RequestValidateProductController;
use App\Http\Response;

require_once __DIR__ . "/../Utils/functionContrucaoModelProductAddProduct.php";

class ProductController{

    public function getProduct($id){
        try {
            $productDAO = new ProductDAO();
            $respostaAoUsuario = $productDAO->getProduct($id[0]);
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => $respostaAoUsuario
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function addProduct(){
        try {
            $body = Request::body();

            RequestValidateProductController::validateControllerProduct($body, "addProduct");
            $body["preco"] = intval($body["preco"] * 100);
            $product = contrucaoModelProductAddProduct($body);
            
            $productDAO = new ProductDAO();
            $respostaAoUsuario = $productDAO->addProduct($product);
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "Message" => $respostaAoUsuario
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function removeProduct($id){
        try {
            $productDAO = new ProductDAO();
            $respostaAoUsuario = $productDAO->removeProduct($id[0]);
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "message" => $respostaAoUsuario
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
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
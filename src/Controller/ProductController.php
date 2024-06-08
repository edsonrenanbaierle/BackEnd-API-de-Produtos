<?php 

namespace App\Controller;

use App\DAO\ProductDAO;
use App\Http\Request;
use App\Http\RequestValidateProductController;
use App\Http\Response;
use App\Model\Product;

require_once __DIR__ . "/../Utils/functionContrucaoModelProduct.php";
require_once __DIR__ . "/../Utils/functionRetornarDadosApiProducts.php";

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
        try {
            $body = Request::body();

            RequestValidateProductController::validateControllerProduct($body, "updateProduct");
            $body["preco"] = intval($body["preco"] * 100);
            $product = contrucaoModelProductUpdateProduct($body);
            
            $productDAO = new ProductDAO();
            $respostaAoUsuario = $productDAO->updateProduct($id[0], $product);
            
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

    public function listAllProduct(){
        try {
            $productDAO = new ProductDAO();
            $respostaAoUsuario = $productDAO->listAllProduct();
            
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

    public function consumirApi(){
        try {
            $data = retornarDadosApiProducts();
            $productDao = new ProductDAO();
            for($ind = 0; $ind < count($data); $ind++){
                $product = contrucaoModelProductApi($data[$ind]);
                $productDao->addProduct($product);
            }
            
            Response::responseMessage([
                "sucess" => true,
                "failed" => false,
                "data" => "Sucesso ao cadastrar os produtos"
            ], 200);

        } catch (\Exception $e) {
            Response::responseMessage([
                "sucess" => false,
                "failed" => true,
                "error" => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
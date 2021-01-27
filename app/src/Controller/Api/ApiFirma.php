<?php
namespace App\Controller\Api;

class ApiFirma{

    public function __construct($url){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        $this->model = new \App\models\firmaModel();
       
        
        $method = isset($url['3']) ? $url['3'] : 'index';
        $id = isset($url['4']) ? $url['4'] : false;
        switch($method){
            case 'wyswietl':
                $this->read($id);
                break;
            
            case 'dodaj':
                $this->create();
                break;
            case 'zaktualizuj':
                $this->update();
                break;
            case 'usun':
                $this->remove();
                break;
            case "index":
                $this->index();
                break;
            default:
                $this->index();
                

        };
            

        
        
        

     
    }

    public function create(){
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $data = json_decode(file_get_contents("php://input"));
        echo $this->model->createCompany($data);
        
    }

    public function read($id){
        echo json_encode($this->model->getCompany($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    }

    public function update(){
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $data = json_decode(file_get_contents("php://input"));
        echo $this->model->updateCompany($data);

    }

    public function remove(){
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->id)){
            echo $this->model->removeCompany($data->id);
        }
        

    }

    public function index(){
        echo 'Nieprawidłowy adres';
    }


}
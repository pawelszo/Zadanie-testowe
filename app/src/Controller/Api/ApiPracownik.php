<?php
namespace App\Controller\Api;
use App\Helpers\logger as helper;


class ApiPracownik{

    public function __construct($url){
        $this->helper = new \App\helpers\logger;
        $this->model = new \App\models\pracownikModel();
        
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
               
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
        $this->model->createUser($data);
        
    }

    public function read($id){
        

        echo json_encode($this->model->getUsers($id), JSON_PRETTY_PRINT);
        $this->helper->dodajLog(__FILE__, 'read', 'None');

    }

    public function update(){
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $data = json_decode(file_get_contents("php://input"));
        $this->model->updateUser($data);
        $this->helper->dodajLog(__FILE__, 'update', 'True');

    }

    public function remove(){
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        $data = json_decode(file_get_contents("php://input"));
        $this->mode->removeUser($data->id);

    }

    public function index(){
        echo 'Nieprawidłowy adres';
    }


}
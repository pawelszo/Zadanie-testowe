<?php
namespace App\models;
class firmaModel{

    public function __construct(){
        $this->db = new \App\libs\Database();
    }

    public function getCompany($id = ''){
        if(!empty($id)){
            $this->db->statement('SELECT * FROM firmy WHERE id = :id');
            $this->db->bind('id', $id);
        }else{
            $this->db->statement('SELECT * FROM firmy');
        }
        
        $feedback = $this->db->result();
        if($feedback){
            
            return $feedback;
        }
        return 'Brak danych';
        
    }

    public function createCompany($data){
        $img = $data->logo ?? 'https://via.placeholder.com/150';
        $this->db->statement('INSERT into firmy (nazwa, data_dodania, data_modyfikacji, logo) VALUES (:nazwa, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, :logo)');
        $this->db->bind('nazwa', $data->nazwa);
        $this->db->bind('logo', $img);
        if($this->db->execute()){
            return 'Pozytywnie dodano firmę';
        }
        return 'Error';
    }

    public function removeCompany($id){
        $this->db->statement('DELETE from firmy WHERE id = :id');
        $this->db->bind('id', $id);
        if($this->db->execute()){
            if($this->removeUsersFromCompany($id)){
                return "Sukces";
            }
            return "Error przy usuwaniu uzytkowników";
        }
        return "Error";
    }

    public function updateCompany($data)
    {
        $this->db->statement('UPDATE firmy set nazwa=:nazwa, logo=:logo, data_modyfikacji = CURRENT_TIMESTAMP WHERE id = :id');
        $this->db->bind('id', $data->id);
        $this->db->bind('nazwa', $data->nazwa);
        $this->db->bind('logo', $data->logo);
        if($this->db->execute()){
            return 'Aktualizacja pozytywna';
        }
        return 'Error';
    }

    private function removeUsersFromCompany($id){
        $this->db->statement('UPDATE pracownicy SET firma = "0" WHERE firma = :firmaId');
        $this->db->bind('firmaId', $id);
        $this->db->execute();
        return true;
    }
}
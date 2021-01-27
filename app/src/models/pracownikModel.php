<?php
namespace App\models;
class pracownikModel{

    public function __construct(){
        $this->db = new \App\libs\Database();
    }

    public function getUsers($id = ''){
        if(!empty($id)){
            $this->db->statement('SELECT * FROM pracownicy WHERE id = :id');
            $this->db->bind('id', $id);
        }else{
            $this->db->statement('SELECT * FROM pracownicy');
        }
        
        $feedback = $this->db->result();
        if($feedback){

            return $feedback;
        }
        return 'Brak danych';
        
    }

    public function createUser($data){
        
        $this->db->statement('INSERT into pracownicy (imie, nazwisko, firma, data_dodania, data_modyfikacji) VALUES (:imie, :nazwisko, :firma, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)');
        $this->db->bind('imie', $data->imie);
        $this->db->bind('nazwisko', $data->nazwisko);
        $this->db->bind('firma', $data->firma);
        $this->db->execute();
    }

    public function removeUser($id){
        $this->db->statement('DELETE from pracownicy WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function updateUser($data)
    {
        $this->db->statement('UPDATE pracownicy set imie=:imie, nazwisko=:nazwisko, data_modyfikacji = CURRENT_TIMESTAMP WHERE id = :id');
        $this->db->bind('id', $data->id);
        $this->db->bind('imie', $data->imie);
        $this->db->bind('nazwisko', $data->nazwisko);
        $this->db->execute();
    }
}
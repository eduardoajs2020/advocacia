<?php

class Processo{

    public $id;
    public $title;
    public $description;
    public $image;
    public $trailer;
    public $category;
    public $length;
    public $users_id;

    public function imageGenerateName(){
        return bin2hex(random_bytes(60)).".jpg";
    }

}
interface ProcessoDAOInterface{

    public function buildProcesso($data);
    public function findAll();
    public function getLatestProcess();
    public function getClientsByCategory($category);
    public function getClientsByUserId($id);
    public function findById($id);
    public function findByTitle($title);
    public function create(Processo $process);
    public function update(Processo $process);
    public function destroy($id);

}


?>

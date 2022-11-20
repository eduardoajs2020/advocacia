<?php

class Client{

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
interface ClientDAOInterface{

    public function buildClient($data);
    public function findAll();
    public function getLatestClients();
    public function getClientsByCategory($category);
    public function getClientsByUserId($id);
    public function findById($id);
    public function findByTitle($title);
    public function create(Client $client);
    public function update(Client $client);
    public function destroy($id);

}


?>

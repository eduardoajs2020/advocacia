<?php

require_once("models/Client.php");
require_once("models/Message.php");
require_once("models/processo.php");

//Review DAO
require_once("dao/ReviewDAO.php");
class ClientDAO implements ClientDAOInterface{

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url){

        $this->conn=$conn;
        $this->url=$url;
        $this->message= new Message($url);

    }

    public function buildClient($data){

        $client = new Client();

        $client->id = $data["id"];
        $client->title = $data["title"];
        $client->description = $data["description"];
        $client->image = $data["image"];
        $client->trailer = $data["trailer"];
        $client->category = $data["category"];
        $client->length = $data["length"];
        $client->users_id = $data["users_id"];

       /* //Recebe as ratings do filme
        $reviewDao = new ReviewDao($this->conn, $this->url);

        $rating = $reviewDao->getRatings($client->id);

        $client->rating = $rating;

        return $client;*/

    }

    public function findAll(){

    }

    public function getLatestClients(){
        $clients = [];

        $stmt = $this->conn->query("SELECT * FROM clients ORDER BY id DESC");

        $stmt->execute();

        if($stmt->rowCount() >0){

            $clientsArray = $stmt-> fetchAll();

            foreach($clientsArray as $client){
                $client[] = $this->buildClient($client);
            }
        }

        return $clients;
    }

    public function getClientsByCategory($category){

         $clients = [];

        $stmt = $this->conn->prepare("SELECT * FROM clients
                                     WHERE category = :category
                                    ORDER BY id DESC");

        $stmt->bindParam(":category", $category);

        $stmt->execute();

        if($stmt->rowCount() >0){

            $clientsArray = $stmt-> fetchAll();

            foreach($clientsArray as $client){
                $clients[] = $this->buildClient($client);
            }
        }

        return $clients;
    }


    public function getClientsByUserId($id){

        $clients = [];

        $stmt = $this->conn->prepare("SELECT * FROM clients
                                     WHERE users_id = :users_id");

        $stmt->bindParam(":users_id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $clientsArray = $stmt-> fetchAll();

            foreach($clientsArray as $client){
                $clients[] = $this->buildClient($client);
            }
        }

        return $clients;

    }

    public function findById($id){

        $client = [];

        $stmt = $this->conn->prepare("SELECT * FROM clients
                                     WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $clientData = $stmt-> fetch();

            $client = $this->buildClient($clientData);

            return $client;

        }else{

            return false;

        }


    }

    public function findByTitle($title){

        $clients = [];

        $stmt = $this->conn->prepare("SELECT * FROM clients
                                     WHERE title LIKE :title");

        $stmt->bindValue(":title", '%'.$title.'%');

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $clientsArray = $stmt-> fetchAll();

            foreach($clientsArray as $client){
                $clients[] = $this->buildClient($client);
            }



        }
        return $clients;
}

    public function create(Client $client){

        $stmt = $this->conn->prepare("INSERT INTO clients(
            title, description, image, trailer, category, length, users_id
        )VALUES(
            :title, :description, :image, :trailer, :category, :length, :users_id
        )");

            $stmt->bindParam(":title", $client->title);
            $stmt->bindParam(":description", $client->description);
            $stmt->bindParam(":image", $client->image);
            $stmt->bindParam(":trailer", $client->trailer);
            $stmt->bindParam(":category", $client->category);
            $stmt->bindParam(":length", $client->length);
            $stmt->bindParam(":users_id", $client->users_id);

            $stmt->execute();

            //Mensagem de sucesso ao adicionar filme
            $this->message->setMessage("Cliente adicionado com sucesso!","success","index.php");
    }

    public function update(Client $client){

        $stmt=$this->conn->prepare("UPDATE $client SET
            title = :title,
            description = :description,
            image = :image,
            category = :category,
            trailer = :trailer,
            length = :length
            WHERE id = :id
        ");
        $stmt->bindParam(":title", $client->title);
        $stmt->bindParam(":description", $client->description);
        $stmt->bindParam(":image", $client->image);
        $stmt->bindParam(":category", $client->category);
        $stmt->bindParam(":trailer", $client->trailer);
        $stmt->bindParam(":length", $client->length);
        $stmt->bindParam(":id", $client->id);

        $stmt->execute();

        //Mensagem de sucesso ao editar filme
            $this->message->setMessage("Cliente atualizado com sucesso!","success","dashboard.php");

    }

    public function destroy($id){

        $stmt = $this->conn->prepare("DELETE FROM clients WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt-> execute();

        //Mensagem de sucesso ao remover processo
            $this->message->setMessage("Cliente removido com sucesso!","success","dashboard.php");
    }

}

?>

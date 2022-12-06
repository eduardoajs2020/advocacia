<?php
require_once("models/User.php");
require_once("models/Advogados.php");
require_once("models/Message.php");

class AdvogadosDAO implements AdvogadosDAOInterface{

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url){

        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildAdvogados($data){

        $advogado = new Advogados();

        $advogado->id = $data["id"];
        $advogado->name = $data["name"];
        $advogado->lastname = $data["lastname"];
        $advogado->email = $data["email"];
        $advogado->password = $data["password"];
        $advogado->image = $data["image"];
        $advogado->bio = $data["bio"];
        $advogado->token = $data["token"];

        return $advogado;

    }
    public function create(Advogados $advogado, $authUser = false){

        $stmt = $this->conn->prepare("INSERT INTO users(name, lastname, email, password, token)VALUES(
            :name, :lastname, :email, :password, :token)");

        $stmt->bindParam(":name", $advogado->name);
        $stmt->bindParam(":lastname", $advogado->lastname);
        $stmt->bindParam(":email", $advogado->email);
        $stmt->bindParam(":password", $advogado->password);
        $stmt->bindParam(":token", $$advogado->token);

        $stmt->execute();

        //Autenticar usuario, caso auth seja true
        if($authUser){

            $this->setTokenToSession($advogado->token);
        }
    }
    public function update(Advogados $advogado, $redirect = true){

        $stmt = $this->conn->prepare("UPDATE users SET
        name = :name,
        lastname = :lastname,
        email = :email,
        image = :image,
        bio = :bio,
        token = :token
        WHERE id = :id
        ");

        $stmt->bindParam(":name", $advogado->name);
        $stmt->bindParam(":lastname", $advogado->lastname);
        $stmt->bindParam(":email", $advogado->email);
        $stmt->bindParam(":image", $advogado->image);
        $stmt->bindParam(":bio", $advogado->bio);
        $stmt->bindParam(":token", $advogado->token);
        $stmt->bindParam(":id", $advogado->id);

        $stmt->execute();

        if($redirect){

            //Redireciona para o perfil do usuário
            $this->message->setMessage("Dados atualizados com sucesso!", "success", "editprofile.php" );

    }
}
    public function verifyToken($protected = false){

        if(!empty($_SESSION["token"])){

            //Pega o token da session
        $token = $_SESSION["token"];

        $advogado = $this->findByToken($token);

        if($advogado){

            return $advogado;

        }else if ($protected) {

            //Redireciona o usuário não autenticado
            $this->message->setMessage("Autentique para acessar esta página!", "error", "index.php");

        }
    }else if ($protected) {

            //Redireciona o usuário não autenticado
            $this->message->setMessage("Autentique para acessar esta página!", "error", "index.php");

    }

}
    public function setTokenToSession($token, $redirect = true){

        //Salvar token na session
        $_SESSION["token"] = $token;

        if($redirect){

            //Redireciona para o perfil do usuário
            $this->message->setMessage("Seja bem Vindo", "success", "editprofile.php" );

        }

}
    public function authenticateAdvogado($email, $password){

        $advogado = $this->findByEmail($email);

        if($advogado){

            // checar se as senhas batem
            if(password_verify($password, $advogado->password)){

                //Gerar um token e inserir na session
                $token = $advogado->generateToken();

                $this->setTokenToSession($token, false);

                // Atualizar token no usuário
                $advogado-> token = $token;

                $this->update($advogado,false);

                return true;

            }else{

                return false;
            }

        }else{

            return false;
        }
}
    public function findByEmail($email){

        if($email != ""){

            $stmt = $this->conn->prepare("SELECT * FROM advogados WHERE email = :email");

            $stmt->bindParam("email", $email);

            $stmt->execute();

            if($stmt->rowCount()>0){

                $data = $stmt->fetch();

                $advogado = $this->buildAdvogados($data);

                return $advogado;

            }else{

                return false;
            }

        } else {

            return false;
        }

}
    public function findById($id){
        if($id != "") {

        $stmt = $this->conn->prepare("SELECT * FROM advogados WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0) {

          $data = $stmt->fetch();
          $advogados = $this->buildAdvogados($data);

          return $advogados;

        } else {
          return false;
        }

      } else {
        return false;
      }

    }

    public function findByToken($token){

        if($token != ""){

            $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");

            $stmt->bindParam("token", $token);

            $stmt->execute();

            if($stmt->rowCount()>0){

                $data = $stmt->fetch();

                $advogados = $this->buildAdvogados($data);

                return $advogados;

            } else{

                return false;
            }

        }else{

            return false;
        }

}

    public function destroyToken(){

        //Remove token da session
        $_SESSION["token"] = "";

        //Redirecionar e apresentar a mensagem de sucesso
        $this->message->setMessage("Você fez o logout com sucesso!", "sucess", "index.php");

}

    public function changePassword(Advogados $advogados){
        $stmt = $this->conn->prepare("UPDATE users SET
        password = :password
        WHERE id = :id
      ");

      $stmt->bindParam(":password", $advogados->password);
      $stmt->bindParam(":id", $advogados->id);

      $stmt->execute();

      // Redirecionar e apresentar a mensagem de sucesso
      $this->message->setMessage("Senha alterada com sucesso!", "success", "editprofile.php");

    }
}

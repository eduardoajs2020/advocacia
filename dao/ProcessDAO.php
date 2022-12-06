<?php

require_once("models/Message.php");
require_once("models/Processo.php");
require_once("utils/db.php");
require_once("globals.php");
require_once("processo_filters.php");

//Review DAO
//require_once("dao/ReviewDAO.php");
class ProcessDAO implements ProcessDAOInterface{

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url){

        $this->conn=$conn;
        $this->url=$url;
        $this->message= new Message($url);

    }

    public function buildProcess($data){

        $process = new Processo();

        $process->id = $data["id"];
        $process->nProcesso = $data["nProcesso"];
        $process->nomeAdvogado = $data["nomeAdvogado"];
        $process->oab = $data["oab"];
        $process->nomeCliente = $data["nomeCliente"];
        $process->cpf = $data["cpf"];
        $process->cnpj = $data["cnpj"];
        $process->email = $data["email"];
        $process->telefone = $data["telefone"];
        $process->poloAtivo = $data["poloAtivo"];
        $process->poloPassivo = $data["poloPassivo"];
        $process->listisconsorte = $data["listisconsorte"];
        $process->tipoAcao = $data["tipoAcao"];
        $process->objetoAcao = $data["objetoAcao"];
        $process->vara = $data["vara"];
        $process->comarca = $data["comarca"];
        $process->rito = $data["rito"];
        $process->foro = $data["foro"];
        $process->andar = $data["andar"];
        $process->area = $data["area"];
        $process->fase = $data["fase"];
        $process->situacao = $data["situacao"];
        $process->instancia = $data["instancia"];
        $process->valorCausa = $data["valorCausa"];
        $process->dataDistribuicao = $data["dataDistribuicao"];
        $process->dataBaixa = $data["dataBaixa"];
        $process->users_id = $data["users_id"];

       /* //Recebe as ratings do filme
        $reviewDao = new ReviewDao($this->conn, $this->url);

        $rating = $reviewDao->getRatings($client->id);

        $client->rating = $rating;

        return $client;*/

    }

    public function findAll(){

    }

    public function getLatestProcess(){
        $process = [];

        $stmt = $this->conn->query("SELECT * FROM processo ORDER BY id DESC");

        $stmt->execute();

        if($stmt->rowCount() >0){

            $processArray = $stmt-> fetchAll();

            foreach($processArray as $$process){
                $process[] = $this->buildProcess($$process);
            }
        }

        return $process;
    }

    public function getProcessByTipoacao($tipoAcao){

          $process = [];

        $stmt = $this->conn->prepare("SELECT * FROM  processo
                                     WHERE tipoAcao = :tipoAcao
                                    ORDER BY id DESC");

        $stmt->bindParam(":tipoAcao", $tipoAcao);

        $stmt->execute();

        if($stmt->rowCount() >0){

            $processArray = $stmt-> fetchAll();

            foreach($processArray as $$process){
                $process[] = $this->buildProcess($$process);
            }
        }

        return $process;
    }


    public function getProcessByUserId($id){

        $process = [];

        $stmt = $this->conn->prepare("SELECT * FROM processo
                                     WHERE users_id = :users_id");

        $stmt->bindParam(":users_id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $processArray = $stmt-> fetchAll();

            foreach($processArray as $$process){
                $process[] = $this->buildProcess($$process);
            }
        }

        return $process;

    }

    public function findById($id){

        $$process = [];

        $stmt = $this->conn->prepare("SELECT * FROM processo
                                     WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $processData = $stmt-> fetch();

            $$process = $this->buildProcess($processData);

            return $$process;

        }else{

            return false;

        }


    }

    public function findByTitle($title){

        $process = [];

        $stmt = $this->conn->prepare("SELECT * FROM processo
                                     WHERE title LIKE :title");

        $stmt->bindValue(":title", '%'.$title.'%');

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $processArray = $stmt-> fetchAll();

            foreach($processArray as $$process){
                $process[] = $this->buildProcess($$process);
            }



        }
        return $process;
}

public function findBynomeCliente($nomeCliente)
{

        $process = [];

        $stmt = $this->conn->prepare("SELECT * FROM processo
                                     WHERE nomeCliente LIKE :nomeCliente");

        $stmt->bindValue(":nomeCliente", '%'.$nomeCliente.'%');

        $stmt->execute();

        if($stmt->rowCount() > 0){

            $processArray = $stmt-> fetchAll();

            foreach($processArray as $$process){
                $process[] = $this->buildProcess($$process);
            }



        }
        return $process;
}


    public function create(Processo $process){

        $stmt = $this->conn->prepare("INSERT INTO processo(
            id, nProcesso, nomeAdvogado, oab, nomeCliente, cpf, cnpj, email, telefone, poloAtivo, poloPassivo, litisconsorte, tipoAcao, objetoAcao, vara, comarca, rito, foro, andar, area, fase, situacao, instancia, valorCausa, dataDistribuicao, dataBaixa, users_id
        )VALUES(
            :id, :nProcesso, :nomeAdvogado, :oab, :nomeCliente, :cpf, :cnpj, :email, :telefone, :poloAtivo, :poloPassivo, :litisconsorte, :tipoAcao, :objetoAcao, :vara, :comarca, :rito, :foro, :andar, :area, :fase, :situacao, :instancia, :valorCausa, :dataDistribuicao, :dataBaixa, :users_id
        )");
            $stmt->bindParam(":id", $process->id);
            $stmt->bindParam(":nProcesso", $process->nProcesso);
            $stmt->bindParam(":nomeAdvogado", $process->nomeAdvogado);
            $stmt->bindParam(":aob", $process->oab);
            $stmt->bindParam(":nomeCliente", $process->nomeCliente);
            $stmt->bindParam(":cpf", $process->cpf);
            $stmt->bindParam(":cnpj", $process->cnpj);
            $stmt->bindParam(":email", $process->email);
            $stmt->bindParam(":telefone", $process->telefone);
            $stmt->bindParam(":poloAtivo", $process->poloAtivo);
            $stmt->bindParam(":poloPassivo", $process->poloPassivo);
            $stmt->bindParam(":litisconsorte", $process->litisconsorte);
            $stmt->bindParam(":tipoAcao", $process->tipoAcao);
            $stmt->bindParam(":objetoAcao", $process->objetoAcao);
            $stmt->bindParam(":vara", $process->vara);
            $stmt->bindParam(":comarca", $process->comarca);
            $stmt->bindParam(":rito", $process->rito);
            $stmt->bindParam(":foro", $process->foro);
            $stmt->bindParam(":andar", $process->andar);
            $stmt->bindParam(":area", $process->area);
            $stmt->bindParam(":fase", $process->fase);
            $stmt->bindParam(":situacao", $process->situacao);
            $stmt->bindParam(":instancia", $process->instancia);
            $stmt->bindParam(":valorCausa", $process->valorCausa);
            $stmt->bindParam(":dataDistribuicao", $process->dataDistribuicao);
            $stmt->bindParam(":dataBaixa", $process->dataBaixa);
            $stmt->bindParam(":users_id",  $process->users_id);

            $stmt->execute();

            //Mensagem de sucesso ao adicionar processo
            $this->message->setMessage("Processo adicionado com sucesso!","success","index.php");
    }

    public function update(Processo $process){

        $stmt=$this->conn->prepare("UPDATE $process SET

            nProcesso = :nProcesso,
            nomeAdvogado = :nomeAdvogado,
            oab = :oab,
            nomeCliente = :nomeCliente,
            cpf = :cpf,
            cnpj = :cnpj,
            email = :email,
            telefone = :telefone,
            poloAtivo = :poloAtivo,
            poloPassivo = :poloPassivo,
            litisconsorte = :litisconsorte,
            tipoAcao = :tipoAcao,
            objetoAcao = :objetoAcao,
            vara = :vara,
            comarca = :comarca,
            rito = :rito,
            foro = :foro,
            andar = :andar,
            area = :area,
            fase = :fase,
            situacao = :situacao,
            instancia = :instancia,
            valorCausa = :valorCausa,
            dataDistribuicao = :dataDistribuicao,
            dataBaixa = :dataBaixa,
            users_id = : users_id
            WHERE id = :id
        ");
            $stmt->bindParam(":id", $process->id);
            $stmt->bindParam(":nProcesso", $process->nProcesso);
            $stmt->bindParam(":nomeAdvogado", $process->nomeAdvogado);
            $stmt->bindParam(":aob", $process->oab);
            $stmt->bindParam(":nomeCliente", $process->nomeCliente);
            $stmt->bindParam(":cpf", $process->cpf);
            $stmt->bindParam(":cnpj", $process->cnpj);
            $stmt->bindParam(":email", $process->email);
            $stmt->bindParam(":telefone", $process->telefone);
            $stmt->bindParam(":poloAtivo", $process->poloAtivo);
            $stmt->bindParam(":poloPassivo", $process->poloPassivo);
            $stmt->bindParam(":litisconsorte", $process->litisconsorte);
            $stmt->bindParam(":tipoAcao", $process->tipoAcao);
            $stmt->bindParam(":objetoAcao", $process->objetoAcao);
            $stmt->bindParam(":vara", $process->vara);
            $stmt->bindParam(":comarca", $process->comarca);
            $stmt->bindParam(":rito", $process->rito);
            $stmt->bindParam(":foro", $process->foro);
            $stmt->bindParam(":andar", $process->andar);
            $stmt->bindParam(":area", $process->area);
            $stmt->bindParam(":fase", $process->fase);
            $stmt->bindParam(":situacao", $process->situacao);
            $stmt->bindParam(":instancia", $process->instancia);
            $stmt->bindParam(":valorCausa", $process->valorCausa);
            $stmt->bindParam(":dataDistribuicao", $process->dataDistribuicao);
            $stmt->bindParam(":dataBaixa", $process->dataBaixa);
            $stmt->bindParam(":users_id",  $process->users_id);


        $stmt->execute();

        //Mensagem de sucesso ao editar processo
            $this->message->setMessage("Processo atualizado com sucesso!","success","dashboard.php");

    }

    public function destroy($id){

        $stmt = $this->conn->prepare("DELETE FROM processo WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt-> execute();

        //Mensagem de sucesso ao remover processo
            $this->message->setMessage("Processo removido com sucesso!","success","dashboard.php");
    }

}

?>

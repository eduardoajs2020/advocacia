<?php

class Processo{

    public $id;
    public $nProcesso;
    public $nomeAdvogado;
    public $oab;
    public $nomeCliente;
    public $cpf;
    public $cnpj;
    public $email;
    public $telefone;
    public $poloAtivo;
    public $poloPassivo;
    public $listisconsorte;
    public $tipoAcao;
    public $objetoAcao;
    public $vara;
    public $comarca;
    public $rito;
    public $foro;
    public $andar;
    public $area;
    public $fase;
    public $situacao;
    public $instancia;
    public $valorCausa;
    public $dataDistribuicao;
    public $dataBaixa;
    public $users_id;

    public function imageGenerateName(){
        return bin2hex(random_bytes(60)).".jpg";
    }

}
interface ProcessDAOInterface{

    public function buildProcess($data);
    public function findAll();
    public function getLatestProcess();
    public function getProcessByTipoacao($tipoAcao);
    public function getProcessByUserId($id);
    public function findById($id);
    public function findBynomeCliente($nomeCliente);
    public function create(Processo $process);
    public function update(Processo $process);
    public function destroy($id);

}


?>

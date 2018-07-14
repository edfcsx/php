<?php
/**
 * Created by PhpStorm.
 * User: Eduardo
 * Date: 13/07/2018
 * Time: 11:53
 */
session_start();
require_once 'Conexao.php';

class Crud extends Conexao {

private $con;

public function __construct(){
    $this->con = parent::getConexao();
}

    public function exibirContatos($metodo,$pagina,$dados = null){
        if ($pagina == 1){
            $intervalo = 0;
        }else{
            $intervalo = $pagina*5-5;
        }

        $exibirContato = $this->con->prepare("SELECT id,nome,assunto,email FROM contato ORDER BY id DESC LIMIT 5 OFFSET $intervalo");
        $exibirContato->execute();

        if ($exibirContato->rowCount() == 0) {
            echo "<tr>";
            echo "<td colspan='5' class='text-center'>Não existem contatos</td>";
            echo "</tr>";
        }else{
            if ($metodo == 'default'){
                while ($row = $exibirContato->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>".$row['nome']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['assunto']."</td>";
                    echo "<td>";
                    echo "<a href='contato.php?id=$id' class='btn-sm btn-info btn' target='_blank' style='margin-right: 5px'>Exibir</a>";
                    echo "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal$id'>";
                    echo "apagar</button>";
                    echo "</td>";
                    echo "</tr>";
                    $this->construirModal('Você realmente deseja apagar o contato ?',$id);
                }
            $this->ativarModal();
            }elseif ($metodo == 'pesquisa'){
                $exibirContato = $this->con->prepare("SELECT id,nome,assunto,email FROM contato WHERE nome LIKE :dados OR email LIKE :dados OR assunto LIKE :dados ORDER BY id DESC LIMIT 5 OFFSET $intervalo");
                $exibirContato->bindValue(":dados",'%'.$dados.'%');
                $exibirContato->execute();
                while ($row = $exibirContato->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>".$row['nome']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['assunto']."</td>";
                    echo "<td>";
                    echo "<a href='contato.php?id=$id' class='btn-sm btn-info btn' target='_blank' style='margin-right: 5px'>Exibir</a>";
                    echo "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal$id'>";
                    echo "apagar</button>";
                    echo "</td>";
                    echo "</tr>";
                    $this->construirModal('Você realmente deseja apagar o contato ?',$id);
                }
                $this->ativarModal();
            }

        }
    }

    public function construirModal($body,$id){
        echo "<div class='modal fade' id='modal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='exampleModalLabel'></h5>";
        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "<span aria-hidden='true'>&times;</span>";
        echo "</button></div>";
        echo "<div class='modal-body'>";
        echo "$body";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Não</button>";
        echo "<button type='button' class='btn btn-success' onclick='ativarForm($id)'>Sim</button>";
        echo "</div></div></div></div>";
        echo "<form action='' method='post' id='$id'>";
        echo "<input type='hidden' name='btnApagar' value='$id'>";
        echo "</form>";
        unset($body,$id);
    }

    public function ativarModal(){
        $id = '$'.'id';
        echo "<script> function ativarForm($id) { document.getElementById($id).submit();}
</script>";
        unset($id);
    }

    public function paginacao($paginacaoParametro,$pagina,$dados = null){

        if ($paginacaoParametro == 'default'){
            $pdo = $this->con->prepare("SELECT id FROM contato");
            $pdo->execute();
            $qtdTotal = $pdo->rowCount();


        }elseif ($paginacaoParametro == 'chave'){
            $pdo = $this->con->prepare("SELECT id,nome,assunto,email FROM contato WHERE nome LIKE :dados OR email LIKE :dados OR assunto LIKE :dados");
            $pdo->bindValue(":dados",'%'.$dados.'%');
            $qtdTotal = $pdo->rowCount();
        }

        $inicio = 1;
        if ($qtdTotal <= 5){
            $fim = 1;
        }else{
            $fim = ($qtdTotal / 5) + 1;
            $fim = intval($fim);
        }

        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination justify-content-center'>";
        for ($w = $inicio; $w <= $fim; $w++){
            if ($pagina == $w){
                echo "<li class='page-item'><a style='background-color: #d63031; color: white' class='page-link' href='index.php?pagina=$w'>$w</a></li>";
            }else{
                echo "<li class='page-item'><a class='page-link' href='index.php?pagina=$w'>$w</a></li>";
            }
        }

        echo "</ul></nav>";
    }

    public function apagarContato($id){
        $pdo = $this->con->prepare("DELETE FROM contato WHERE id=:id");
        $pdo->bindValue(":id",$id);
        if ($pdo->execute()){
            return $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro apagado com sucesso</div>";
        }else{
            return $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel apagar o registro.</div>";
        }
    }

    public function carregarContato($id){
        $pdo = $this->con->prepare("SELECT id,nome,email,assunto,mensagem,data FROM contato WHERE id=:id");
        $pdo->bindValue(":id",$id);
        $pdo->execute();
        return $dados = $pdo->fetch(PDO::FETCH_ASSOC);
    }

    public function alterarContato($id, array $dados){
        $pdo = $this->con->prepare("UPDATE contato SET nome=:nome, email=:email, assunto=:assunto, mensagem=:mensagem WHERE id=:id");
        $pdo->bindValue(':nome',$dados['nome']);
        $pdo->bindValue(':email',$dados['email']);
        $pdo->bindValue(':assunto',$dados['assunto']);
        $pdo->bindValue(':mensagem',$dados['mensagem']);
        $pdo->bindValue(':id',$id);

        if ($pdo->execute()){
            return $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro alterado com sucesso</div>";
        }else{
            return $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel alterar o registro.</div>";
        }
    }

    public function cadastrarContato(array $dados){
        $pdo = $this->con->prepare("INSERT INTO contato(nome,email,assunto,mensagem,data) 
VALUES (:nome, :email, :assunto, :mensagem, :data)");
        $pdo->bindValue(':nome', $dados['nome']);
        $pdo->bindValue(':email', $dados['email']);
        $pdo->bindValue(':assunto', $dados['assunto']);
        $pdo->bindValue(':mensagem', $dados['mensagem']);
        $data = date('Y').'/'.date('m').'/'.date('d');
        $pdo->bindValue(':data', $data);

        if ($pdo->execute()){
            return $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Mensagem do sistema: Registro inserido com sucesso</div>";
        }else{
            return $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Mensagem do sistema: Não foi possivel inserir o registro.</div>";
        }

    }


}
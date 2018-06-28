protected function alterarFotoCurso($dados){
        $a = new Ferramentas();
        $pasta = 'assets/images/curso/';
        $erro = $_FILES['arquivo']['error'];
        $id = $dados['id'];
        $key = false;
        if ($_FILES['arquivo']['name'] == null OR empty($_FILES['arquivo']['name'])){
            $a->alerta('Carregue a imagem primeiro.');
        }else{
            $extensoes = ['jpg','png','jpeg'];
            $ext = $_FILES['arquivo']['type'];
            $extensao = explode('/',strtolower($ext));
            $extensao = $extensao[1];
            if (array_search($extensao,$extensoes)=== false){
                $a->alerta('O formato '.$extensao.' Não é permitido');
                $key = true;
            }
            switch ($erro){
                case 1:
                    $a->alerta("O arquivo no upload é maior que o limite do PHP");
                    $key = true;
                    break;
                case 2:
                    $a->alerta("O arquivo ultrapassa o limite de tamanho especificado no HTML");
                    $key = true;
                    break;
                case 3:
                    $a->alerta("O upload do arquivo foi feito parcialmente");
                    $key = true;
                    break;
                case 4:
                    $a->alerta("Não foi feito o upload do arquivo");
                    $key = true;
                    break;
            }
 
            if ($key == false){
                $this->conectar();
                $sql = "SELECT imagem FROM cursos WHERE id='$id'";
                $run = mysqli_query($this->conexao,$sql);
                $imgAntiga = mysqli_fetch_assoc($run);
                $imgAntiga = $imgAntiga['imagem'];
                $imagem = $imgAntiga;
                $imgAntiga = explode('/',$imgAntiga);
                $imgAntiga = end($imgAntiga);
                $this->conectar();
                $sql = "SELECT COUNT(imagem) AS repeticao FROM cursos WHERE imagem='$imagem'";
                $run = mysqli_query($this->conexao,$sql);
                $qtdUso = mysqli_fetch_assoc($run);
                if($qtdUso['repeticao'] == 1) {
                    if (file_exists('assets/images/curso/' . $imgAntiga)) {
                        unlink('assets/images/curso/' . $imgAntiga);
                    }
                }
                $this->conectar();
                $foto = URL.'assets/images/curso/'.$_FILES['arquivo']['name'];
                $sql = "UPDATE cursos SET imagem='$foto' WHERE id='$id'";
                $run = mysqli_query($this->conexao,$sql);
                if(!file_exists('assets/images/curso/'.$_FILES['arquivo']['name'])){
                    move_uploaded_file($_FILES['arquivo']['tmp_name'],$pasta.$_FILES['arquivo']['name']);
                }
                $a->alerta('Imagem trocada com sucesso');
            }
    }
}

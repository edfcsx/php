<?php
/**
 * Created by PhpStorm.
 * User: eduardo.cipriano
 * Date: 12/11/2018
 * Time: 10:46
 */
ini_set('max_execution_time','99999999999999999999999999999999999999999999999');
require_once '../ConexaoServer.php';
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


    $log = fopen('log.txt','a+');

    $path = $_SERVER['DOCUMENT_ROOT'].'/smp/importaAso/Arquivos';
    $caminhoFinal = $_SERVER['DOCUMENT_ROOT'].'/smp/importaAso/ArquivosFinais';

    $pasta = scandir($path);
    $diretorios = array();

    //variaveis
    $sra = ''; //variavel para a tabela de colaboradores do protheus
    $colaboradorEncontrado = false;  //variavel para definir se o colaborador foi encontrado ou não
    $cpf = false; //Cpf dp colaborador
    $pastasRecriadas = 0;
    $pastasNaoRecriadas = 0;
    $pastasLidas = 0;

    //Criando o array de diretorios
    foreach ($pasta as $dir){
        //Os diretorios . e .. são diretorios padroes que não representam nenhuma pasta
        if ($dir != '.' AND $dir != '..'){
            array_push($diretorios,$dir);
        }
    }

    foreach ($diretorios as $nomePasta){

        //Resetando os dados a cada interacao
        $colaboradorEncontrado = false;
        $cpf = false;

        if (strpos($nomePasta,'(')){
            $matricula = explode('(',$nomePasta);
            $matricula = preg_replace('~[.)(]~','',$matricula);
            $matricula = $matricula[1];
        }else{
            $totalString = strlen($nomePasta);
            $qtdCaracteresEliminar = $totalString - 6;
            $matricula = substr($nomePasta,$qtdCaracteresEliminar,6);
        }

        //Tratando as matriculas caso tenha filial ou seja menor que 6
        if (strlen($matricula) < 6){
            $matricula = str_pad($matricula,6,0,STR_PAD_LEFT);
        }

        //Caso a matricula seja maior que 6 iremos realizar o corte considerando os ultimos 6 digitos
        if (strlen($matricula) > 6){
            $qtd = strlen($matricula);
            $qtd -= 6;
            $matricula = substr($matricula,$qtd,6);
        }

        //agora iremos procurar o cpf do colaborador através da matricula gerada na pasta
        for ($w = 1; $w <= 3; $w++){
            //caso o colaborador for encontrado iremos pular todas as outras interações do script
            if ($colaboradorEncontrado == true){
                continue;
            }
            switch ($w){
                case 1:
                    $sra = "SRA010";
                    break;
                case 2:
                    $sra = "SRA020";
                    break;
                case 3:
                    $sra = "SRA030";
                    break;
            }

            $sql = "SELECT RA_CIC FROM $sra as cpf WHERE RA_MAT = '$matricula'";
            $rs = $bdServer->RodarQuery($sql);
            $qtd = $bdServer->TotalRegistros($rs);

            if ($qtd > 0){
                $colaboradorEncontrado = true;
                $dados = $bdServer->RetornaArray($rs);
                $cpf = $dados[0];
            }
        }
        //Fim da interação para pegar o cpf do colaborador

        //Criando nova pasta com os novos arquivos
        if ($colaboradorEncontrado){
            $arquivos = scandir("$path/$nomePasta");
            $pastasRecriadas += 1;
            foreach ($arquivos as $arquivo){

                if (!file_exists("$caminhoFinal/$cpf/$matricula")){
                    mkdir("ArquivosFinais/$cpf");
                    mkdir("ArquivosFinais/$cpf/$matricula");
                }

                if ($arquivo != '.' AND $arquivo != '..'){
                    $origem = "$path/$nomePasta/$arquivo";
                    $destino = "$caminhoFinal/$cpf/$matricula/$arquivo";
                    copy($origem,$destino);
                }

            }

        }else{
            fwrite($log, '-----------------------------------------' . PHP_EOL);
            fwrite($log, "Erro ao criar nova pasta" . PHP_EOL);
            fwrite($log, "Motivo : CPF não encontrado" . PHP_EOL);
            fwrite($log, "Pasta : $nomePasta" . PHP_EOL);
            $pastasNaoRecriadas += 1;
        }
    $pastasLidas += 1;
    }

    fwrite($log, '-----------------------------------------' . PHP_EOL);
    fwrite($log, '-----------------------------------------' . PHP_EOL);
    fwrite($log, '-----------------------------------------' . PHP_EOL);
    fwrite($log, "Total de pastas lidas : $pastasLidas" . PHP_EOL);
    fwrite($log, "Pastas Recriadas : $pastasRecriadas" . PHP_EOL);
    fwrite($log, "Pastas Nao Recriadas : $pastasNaoRecriadas" . PHP_EOL);

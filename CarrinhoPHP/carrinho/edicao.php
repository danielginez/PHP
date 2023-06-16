<?php

    include("classes.php");

    $entrada = $_POST["entrada"];
    if (isset($_POST["quantidade"])) {
        $quantidade = $_POST["quantidade"];
    }
    $botao = $_POST["botao"];
    $dominio = $_POST["dominio"];

    if ($botao == "Adicionar no carrinho") 
    {

        if (!isset($_SESSION["Carrinho"])) 
        {
            $carrinho = new Carrinho();
            $_SESSION["Carrinho"] = $carrinho;
        }
        $_SESSION["Carrinho"]->qtd_item = $quantidade;
        $_SESSION["Carrinho"]->ent_item = $entrada;
        $_SESSION["Carrinho"]->pegar($entrada, $quantidade);

    }elseif($botao == "Remover do carrinho"){
    
        $_SESSION["Carrinho"]->ent_item = $entrada;
    
        $_SESSION["Carrinho"]->devolver($entrada);

    }

    if ($dominio == "carrinho") {
        if ($_SESSION["item_carrinho"] == null) {
            header("Refresh:0; url=../index.php");
        }else{
            header("Refresh:0; url=index.php");
        }
    }else{
        header("Refresh:0; url=../item/index.php?entrada=$entrada");
    }

?>
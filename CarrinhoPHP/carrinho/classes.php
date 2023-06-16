<?php

    session_start();

    class Carrinho{

        public $ent_item;
        public $qtd_item;

        public function pegar($entrada, $quantidade){
            include("../list_produto.php");
            foreach ($item as $key => $value) {
                if ($key == $entrada) {
                    $_SESSION["item_carrinho"][$entrada] = $quantidade;
                }
            }
        }

        public function devolver($entrada){
            include("../list_produto.php");
            foreach ($item as $key => $value) {
                if ($key == $entrada) {
                    unset($_SESSION["item_carrinho"][$key]);
                }
            }
        }

    }

?>
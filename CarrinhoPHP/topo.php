<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php
                echo $_SESSION["title"];
            ?>
        </title>
        <link rel="icon" type="image/x-icon" href="/Trabalho006/images/amazon_16x16.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="/Trabalho006/css/config.css" rel="stylesheet" />
    </head>
    <body>
      <!-- Navibar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/Trabalho006/index.php">
                    <img class="logo" src="/Trabalho006/images/amazon_32x32.png" style="margin-top:5%;width: 32px; height:32px" alt="...">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    </ul>
                    <form class="d-flex" action="/Trabalho006/carrinho/index.php" method="post">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrinho
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php
                            if(isset($_SESSION["item_carrinho"])){
                                $quantidade_itens_carrinho = count($_SESSION["item_carrinho"]);
                            }else{
                                $quantidade_itens_carrinho = 0;
                            }
                                echo $quantidade_itens_carrinho;
                            ?>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
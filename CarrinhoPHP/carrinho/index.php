<?php

    session_start();

    $_SESSION["title"] = "Meu carrinho";

    include("../topo.php");

    include("../list_produto.php");
    

    if (isset($_SESSION["item_carrinho"]) && ($_SESSION["item_carrinho"] != null)) 
    {
       
?>

<main class="flex-fill">
            <div class="container">
                <h1>Carrinho de Compras</h1>
                <ul class="list-group mb-3">
                <?php
                    $total = 0;
                    foreach ($_SESSION["item_carrinho"] as $key => $value) {
                        foreach ($item as $key_produto => $value_produto) {
                                if ($key_produto == $key) {
                ?>
                    <li class="list-group-item py-3">
                        <div class="row g-3">
                            <div class="col-4 col-md-3 col-lg-2">
                                    <img src="<?php echo $value_produto["imagem"];?>" class="img-thumbnail">
                            </div>
                            <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                <h4>
                                    <b class="text-decoration-none ">
                                    <?php echo $value_produto["nome"];?></b>
                                </h4>
                                <h5>
                                Marca: <?php echo $value_produto["marca"];?></b>
                                </h5>
                            </div>
                            <div
                                class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 align-self-center mt-3">
                                <form action="edicao.php" method="post" class="form_produto">
                                                <input type="hidden" name="entrada" value="<?php echo $key;?>">
                                                <input type="hidden" name="dominio" value="<?php echo "carrinho";?>">
                                                <input type="hidden" name="botao" value="<?php echo "Remover do carrinho";?>">
                                                <button class="btn btn-outline-danger border-dark btn-sm" type="submit">
                                                    <i class="bi-trash" style="font-size: 16px; line-height: 16px;"></i>
                                                </button>                                
                                </form>
                                <div class="text-end mt-2">
                                    <small class="text-secondary">
                                    <p class="card-text"><?php echo $value." X R$ ".$value_produto["preco"];?></p>
                                            <?php
                                                $total_produto = $value_produto["preco"] * $value;
                                                if (!($total_produto == $value_produto["preco"])) {
                                                    echo "Total: R$ ".$total_produto;
                                                } 
                                                $total += $total_produto;
                                            ?>
                                    </small>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
        </main>
    <div class="container">
                    <li class="list-group-item py-3">
                        <div class="text-end">
                            <h4 class="text-dark mb-3">
                                 Total = <?php echo "R$ ".$total; ?>
                            </h4>
                            <a href="../index.php" class="btn btn-outline-success btn-lg">
                                Continuar Comprando                            
                            </a>
                            <a href="finalizar_carrinho.php" class="btn btn-danger btn-lg ms-2 mt-xs-3">Fechar Compra</a>
                        </div>
                    </li>
        </div>
        <?php 
            }
        else
            {
        ?>
                <div class="container py-5 bg-white">
                    <p class="m-0 text-center" style="font-size: 100px;"> Carrinho Vazio</p>
                </div>
        <?php
            }
        ?>
        <!-- Footer-->
        <?php
            include("../footer.php");
        ?>
    </body>
</html>

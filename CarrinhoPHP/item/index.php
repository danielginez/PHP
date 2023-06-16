<?php

session_start();

$entrada = $_GET["entrada"]; 

include("../list_produto.php");
foreach ($item as $key => $value) {
    if ($entrada == $key) {
        $ent_value = $value;
    }
}

$_SESSION["title"] = $ent_value["nome"];

include("../topo.php");

?>

        <!-- Product section-->
        <section class="py-2">
            <div class="container px-4 px-lg-7 my-4">
                <div class="row gx-4 gx-lg-6 align-items-center">
                    <div class="col-md-6"><img class="mb-4 mb-md-0 produto_img" src="
                    <?php
                        echo $ent_value["imagem"];
                    ?>
                    " alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">entrada: 
                            <?php
                                echo $entrada;
                            ?>
                        </div>
                        <h1 class="display-5 fw-bolder">
                        <?php
                            echo $ent_value["nome"];
                        ?>
                        </h1>
                        <div class="fs-5 mb-5">
                            <span>
                            <?php
                                echo "Marca: ".$ent_value["marca"];
                            ?>
                            </span>
                        </div>
                        <p class="lead">
                            <?php
                                echo "R$ ".$ent_value["preco"];
                            ?>
                        </p>
                        <div class="d-flex">
                            <form action="../carrinho/edicao.php" method="post" class="form_produto">
                                <input type="hidden" name="entrada" value="<?php echo $entrada;?>">
                                <span>Quantidade</span>
                                <input class="form-control text-center me-3" id="inputQuantity" type="number" min="1" name="quantidade" value="<?php echo $ent_value["quantidade"]?>" style="max-width: 4rem" />
                                <br>
                                <?php
                                $botao = "Adicionar no carrinho";
                                $carrinho_cheio = False;
                                if (isset($_SESSION["item_carrinho"])) 
                                {
                                    $carrinho_cheio = True;
                                    foreach ($_SESSION["item_carrinho"] as $key_carrinho => $value) 
                                    {
                                        if ($key_carrinho == $entrada) 
                                        {
                                            $botao = "Remover do carrinho";
                                        }
                                    }
                                }
                                ?>
                                <input type="hidden" name="botao" value="<?php echo $botao;?>">
                                <input type="hidden" name="dominio" value="<?php echo "produto";?>">
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    <?php
                                        echo $botao;
                                    ?>
                                </button>
                            </form>
                        </div>
                        <?php
                            if (isset($_SESSION["item_carrinho"])) 
                            {
                                if ($_SESSION["item_carrinho"] != null) 
                                {
                                    ?>
                                        <form action="../carrinho/index.php" method="post" style="margin-top: 10px;">
                                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                                <i class="bi bi-bag-fill me-2"></i>
                                                Ir para Carrinho
                                            </button>
                                        </form>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Outros produtos</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                    $count = 0;
                    foreach ($item as $key => $value) {
                        if($entrada != $key && $count < 4){
                        $count++;
                        ?>

                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top produto_img" 
                                src="<?php echo $value["imagem"]; ?>" 
                                alt="..." style= "margin-top: 5%;margin-left:5%; width: 200px; height:170px"/>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">
                                        <?php
                                            echo $value["nome"];
                                        ?>
                                        </h5>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class = "text-center">
                                    <?php
                                        echo "R$ ".$value["preco"];
                                    ?>
                                </div>
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="index.php?entrada=<?php echo $key?>">Compra</a></div>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php
            include("../footer.php");
        ?>
    </body>
</html>

<?php

    session_start();
    $_SESSION["title"] = "Amazon";

    include("list_produto.php");
    include("topo.php")

?>
        <div class="container">
            <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="images/banner01.png" class="d-none d-md-block w-300" alt=""style = "margin-left:5%; width: 1000px; height:250px">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="images/banner02.png" class="d-none d-md-block w-300" alt="" style = "margin-left:5%; width: 1000px; height:250px">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
            <hr class="mt-3">
        </div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5" >
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php
                    foreach ($item as $key => $value) {
                    ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top produto_img" 
                                src="<?php echo $value["imagem"]; ?>" 
                                alt="..." style= "margin-top: 5%;margin-left:5%; width: 200px; height:170px"/>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">
                                        <?php echo $value["nome"]; ?>
                                        </h5>
                                    </div>
                                </div>
                                
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                        <?php echo "R$ ".$value["preco"];?>
                                        </div>
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="item/index.php?entrada=<?php echo $key?>">Compra</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php
            include("footer.php");
        ?>
    </body>
</html>

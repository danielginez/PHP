<?php

session_start();
unset($_SESSION['item_carrinho']);
header("location: ../index.php");

?>
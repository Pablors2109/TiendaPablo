<?php
session_start();
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
}
else{
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logotipo" srcset="">
        <p><?php echo $_SESSION["username"]; ?></p>
    </header>
    <main>
        <aside>
            <h2>Categorías</h2>
            <ul>
                <li><a href="tienda.php?categoria=1">Categoría 1</a></li>
                <li><a href="tienda.php?categoria=2">Categoría 2</a></li>
                <li><a href="tienda.php?categoria=3">Categoría 3</a></li>
            </ul>
    </main>
    
</body>
</html>
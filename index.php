<?php
if (isset($_POST["username"])) {
    include("conexiondb.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM usuarios WHERE username = :username";
    $stm=$conexion->prepare($sql);
    $stm->bindParam(":username", $username);
    $stm->execute();
    $row=$stm->fetch(PDO::FETCH_ASSOC);
    if($row){
       if(password_verify($password, $row["password"])){
           session_start();
           $_SESSION["username"] = $username;
           header("Location: tienda.php");
       }else{
           $error = "Usuario o contraseña incorrectos";
       }
    }else{
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" id="username" required placeholder="username">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required placeholder="password">
        <input type="submit" value="Iniciar sesión">
        <?php if(isset($error)){echo $error;}?>
    </form>
    
</body>
</html>

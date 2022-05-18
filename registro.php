<?php
 
 include("conex.php");
 session_start();
 
 if (isset($_POST['registro'])) {
 
    $username = $_POST['Usuario'];
    $Email = $_POST['correo'];
    $Contraseña = $_POST['Contraseña'];
    $password_hash = password_hash($Contraseña, PASSWORD_BCRYPT);
 
    $query = $connection->prepare("SELECT * FROM Persona WHERE correo=:Email");
    $query->bindParam("correo", $Email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">El correo ya existe!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO Persona(Usuario,Contraseña,correo) VALUES (:username,:password_hash,:Email)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("correo", $Email, PDO::PARAM_STR);
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Registro exitoso</p>';
        } else {
            echo '<p class="error">ERROR $=$</p>';
        }
    }
}
 
?>

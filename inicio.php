<?php
 
 include("conex.php");
session_start();
 
if (isset($_POST['inicio'])) {
 
    $username = $_POST['username'];
    $Contraseñaht = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM Persona WHERE Usuario=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Usuario o contraseña incorrecto</p>';
    } else {
        if (password_verify($Contraseñaht, $result['Contraseña'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Sesion iniciada</p>';
        } else {
            echo '<p class="error">Usuario o contraseña incorrecto</p>';
        }
    }
}
 
?>
<?php 
$conn = new mysqli('localhost', 'id20691284_omar', 'ELtiokuku1$', 'id20691284_ogm');
if (isset($_POST['registro'])) {
    if (!empty(trim($_POST['contraseña_usu'])) && !empty(trim($_POST['nombre_usu']))) {
        $contraseña_usu = $_POST['contraseña_usu'];
        $nombre_usu = $_POST['nombre_usu'];

        $enc_password_usu = password_hash($contraseña_usu, PASSWORD_DEFAULT);
        $conn->query("INSERT INTO usuarios(nombre_usu, contraseña_usu) VALUES('$nombre_usu','$enc_password_usu')");

        if ($conn->affected_rows != 1) {
            $registro_error = "Se produjo un error";
        } else {
            $registro_success = "Su información fue registrada correctamente";
        }
    } else {
        $registro_error = "Se requiere llenar los campos";
    }
}

?>
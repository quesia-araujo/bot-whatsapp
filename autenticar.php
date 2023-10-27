<?php
session_start(); # sempre o primeio código na pgna
require_once('conn.php');

$email_cliente = $_POST['email'];
$senha_cliente = $_POST['senha'];

$busca_email = "SELECT * FROM login WHERE email = '$email_cliente' AND senha = $senha_cliente";
$resultado_busca = mysqli_query($conn, $busca_email);
$total_cliente = mysqli_num_rows($resultado_busca);


if($total_cliente == 1){

    $_SESSION['email'] = $email_cliente;
    $_SESSION['senha'] = $senha_cliente;
    echo"<meta http-equiv='refresh' content='0;url=index.php'>";

}else{
    echo"<meta http-equiv='refresh' content='0;url=login_falhou.php'>";
}
?>
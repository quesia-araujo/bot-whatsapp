<?php
require_once('conn.php');
print_r($_REQUEST);

?>

<?php
######
# Usuario tipo 1
# admin tipo 2
######
$nome_cliente = $_POST['nome'];
$senha_cliente = $_POST['senha'];
$email_cliente = $_POST['email'];

# BUSCA NO BANCO EMAIL DOS CLIENTES

$busca_email = "SELECT * FROM login WHERE email = '$email_cliente'";
$resultado_busca = mysqli_query($conn, $busca_email);
$total_cliente = mysqli_num_rows($resultado_busca);

echo $total_cliente;

# VERIFICAÇÃO

if($total_cliente > 0){
    echo"<meta http-equiv='refresh' content='0;url=email_ja_cadastrado.php'>";
}else{
    $email_cliente = $_POST['email'];
    $sql = "INSERT INTO login (nome, senha, email, tipo) VALUES ('$nome_cliente', '$senha_cliente', '$email_cliente', '1')";
    $query = mysqli_query($conn, $sql);

    if(!$query){
        echo"<meta http-equiv='refresh' content='0;url=erro_cadastro.php'>";
    }else{
        echo"<meta http-equiv='refresh' content='0;url=sucesso.php'>";
    }


}

?>
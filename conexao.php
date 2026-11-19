<?php
$host = "localhost";
$port = "5432";
$dbname = "projeto_crud";
$user = "postgres";
$password = "postgre";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if ($conn) {
    echo "Conexão realizada com sucesso!";
}
?>


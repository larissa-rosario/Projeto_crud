<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contato</title>

</head>
<body>

    <h1>Formulário de Contato</h1>

    <form method="POST" action="contato.php">

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite seu nome">

        <br><br>

        <label>Mensagem:</label>
        <textarea name="mensagem" placeholder="Digite sua mensagem"></textarea>

        <br><br>

        <button type="submit">Enviar</button>

    </form>

    <?php
   
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");

    if (empty($nome) || empty($mensagem)) {
        echo "<p style='color:red'>Por favor, preencha todos os campos!</p>";
    } else {
        echo "<h2>Dados enviados:</h2>";
        echo "Nome: " . htmlspecialchars($nome) . "<br>";
        echo "Mensagem: " . htmlspecialchars($mensagem);
    
    }
    
}



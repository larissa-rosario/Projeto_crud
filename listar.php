<?php

$host = 'localhost';
$port = '5432';
$dbname = 'projeto_crud';
$usuario = 'postgres';
$senha = 'postgre';

$tarefas = [];

try {
    $pdo = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $usuario,
        $senha
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "SELECT id, titulo, descricao, status FROM tarefas ORDER BY id";
    $stmt = $pdo->query($sql);
    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    $erro = "Erro na conexão: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .erro { color: red; padding: 10px; background: #ffebee; }
    </style>
</head>
<body>
    <h1>Tarefas</h1>

    <?php if (!empty($erro)): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
            </tr>
            <?php foreach ($tarefas as $tarefa): ?>
            <tr>
                <td><?= htmlspecialchars($tarefa['id']) ?></td>
                <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
                <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
                <td><?= htmlspecialchars($tarefa['status']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
         
        
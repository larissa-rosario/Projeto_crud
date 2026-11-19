
<?php

$dsn = 'pgsql:host=localhost;port=5432;dbname=projeto_crud';
$usuario = 'postgres';
$senha = 'postgre';

try {

    $pdo = new PDO($dsn, $usuario, $senha);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query('SELECT id, titulo, status FROM tarefas');

    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tarefas as $t) {
        echo htmlspecialchars($t['titulo']) . ' - ' . htmlspecialchars($t['status']) . '<br>';
    }

} catch (PDOException $e) {
    echo 'Erro: ' . htmlspecialchars($e->getMessage());
}

?>

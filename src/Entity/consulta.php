<?php
if (isset($_POST['playerName'])) {
    $playerName = $_POST['playerName'];

    include_once 'conexion.php';

    try {
        $pdo = Database::Conectar();

        $stmt = $pdo->prepare("SELECT * FROM users WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $playerName, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $score = $row['score'];
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (nombre, score) VALUES (:nombre, 0)");
            $stmt->bindParam(':nombre', $playerName, PDO::PARAM_STR);
            $stmt->execute();

            $score = 0;
        }

        header("Location: ../game.php?playerName=$playerName&score=$score&maxScore=$maxScore");
        exit();

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
} else {
    echo "Nombre de jugador no proporcionado en la solicitud.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['scoreActual']) && isset($_POST['playerName'])) {
        $playerName = $_POST['playerName'];
        $newScore = intval($_POST['scoreActual']);

        include_once 'conexion.php';

        try {
            $pdo = Database::Conectar();

            $stmt = $pdo->prepare("SELECT score FROM users WHERE nombre = :nombre");
            $stmt->bindParam(':nombre', $playerName, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $currentScore = intval($row['score']);

            if ($newScore > $currentScore) {
                $stmt = $pdo->prepare("UPDATE users SET score = :score WHERE nombre = :nombre");
                $stmt->bindParam(':score', $newScore, PDO::PARAM_INT);
                $stmt->bindParam(':nombre', $playerName, PDO::PARAM_STR);
                $stmt->execute();

                header("Location: ../game.php?playerName=" . urlencode($playerName) . "&score=" . urlencode($newScore));
                exit(); 
            } else {
                header("Location: ../game.php?playerName=" . urlencode($playerName) . "&score=" . urlencode($currentScore));
                exit();
            }
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}
?>

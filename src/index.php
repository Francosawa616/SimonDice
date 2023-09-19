<!DOCTYPE html>
<html>
<head>
  <title>Simon Game</title>
  <link rel="stylesheet" href="../../Assets/CSS/simon.css">
</head>
<body>
<h1>Simon Game</h1>
<form action="Entity/consulta.php" method="post">
    <label for="player-name">Ingresa tu nombre:</label>
    <input type="text" id="player-name" name="playerName" required>
    <button type="submit">Comenzar el juego</button>
</form>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../../Assets/JS/simon.js"></script>
</body>
</html>

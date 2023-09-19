<!DOCTYPE html>
<html>
<head>
  <title>Simon Game</title>
  <link rel="stylesheet" href="Assets/CSS/simon.css">
</head>
<body>
<a href="index.php" class="back-link">Volver</a>
  <h1>Simon Game</h1>

  <div id="game-screen">
  <?php
    if (isset($_GET['playerName'])) {
        $playerName = $_GET['playerName'];
        $score = isset($_GET['score']) ? $_GET['score'] : 0;
        echo '<h2>Bienvenido, <span id="player-name-display">' . $playerName . '</span></h2>';
        echo '<p>Su puntuación máxima es: ' . $score . '</p>';
    }
  ?>
    <div class="game-container">
      <div class="game-buttons">
        <div class="btn-grid">
          <div class="btn green" id="green"></div>
          <div class="btn red" id="red"></div>
        </div>
        <div class="btn-grid">
          <div class="btn yellow" id="yellow"></div>
          <div class="btn blue" id="blue"></div>
        </div>
      </div>
      <div class="game-controls">
        <button class="start-btn" id="start-button" onclick="startGame()">Start</button>
        <form action="Entity/update_score.php" method="post" id="score-form">
          <button class="restart-btn" type="button" id="restart-button">Restart</button>
          <input type="hidden" name="playerName" value="<?php echo $playerName; ?>">
          <input type="hidden" name="scoreActual" id="score-actual" value="<?php echo $score; ?>">
        </form>
        <span id="count-display"></span>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="Assets/JS/simon.js"></script>
</body>
</html>

var gamePattern = [];
var userPattern = [];
var buttonColors = ["red", "blue", "green", "yellow"];
var level = 0;
var gameStarted = false;
var countDisplay = $("#count-display");
var contador = 0;

function nextSequence() {
  userPattern = [];
  level++;
  $("#level-title").text("Level " + level);

  for (var i = 0; i < gamePattern.length; i++) {
    setTimeout(function(color) {
      $("#" + color)
        .fadeIn(100)
        .fadeOut(100)
        .fadeIn(100);
    }, i * 500, gamePattern[i]);
  }

  setTimeout(function() {
    var randomNum = Math.floor(Math.random() * 4);
    var randomColor = buttonColors[randomNum];
    gamePattern.push(randomColor);
    $("#" + randomColor)
      .fadeIn(100)
      .fadeOut(100)
      .fadeIn(100);
    countDisplay.text(level);
  }, gamePattern.length * 500);
}

function animatePress(currentColor) {
  $("#" + currentColor).addClass("pressed");
  setTimeout(function() {
    $("#" + currentColor).removeClass("pressed");
  }, 100);
}

$(".btn").click(function() {
  if (gameStarted) {
    var userColor = $(this).attr("id");
    userPattern.push(userColor);
    animatePress(userColor);
    checkAnswer(userPattern.length - 1);
  }
});

function checkAnswer(currentLevel) {
  if (userPattern[currentLevel] === gamePattern[currentLevel]) {
    if (userPattern.length === gamePattern.length) {
      setTimeout(function() {
        nextSequence();
      }, 1000);
    }
  } else {
    $("body").addClass("game-over");
    setTimeout(function() {
      $("body").removeClass("game-over");
    }, 200);
    $("#level-title").text("Game Over, Press Start to Restart");
    gameStarted = false;

    alert("¡Perdiste!");

    setTimeout(function() {
      $("#game-over-message").fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200, function() {
        countDisplay.text(contador);
      });
    }, 1000);
  }
}

function startGame() {
  if (!gameStarted) {
    gameStarted = true;
    nextSequence();
  }
}

function startOver() {
  gamePattern = [];
  userPattern = [];
  level = 0;
  $("#level-title").text("Game Over, Press Start to Restart");
}

$("#restart-button").click(function() {
  contador = parseInt(countDisplay.text());
  
  $("#score-actual").val(contador);
  
  $("#score-form").submit();
});

$("#start-button").click(function() {
  startGame();
});

$("#reset-button").click(function() {
  startOver();
});

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <title>Steen, Papier, Schaar</title>
    <link rel="stylesheet" type="text/css" href="sps.css">

  </head>
  <body>
<?php

if(isset($_POST["start"])) {
	$_SESSION["user"] = mt_rand(1,9999999);
	$_SESSION["score"] = 0;
}
if(isset($_POST["stop"])) {
	session_destroy();
	header("location: index.php");
}
if(isset($_SESSION['user'])) {
	if(isset($_POST["game"])) {
		$sps = array("Steen", "Papier", "Schaar", "Hagedis", "Spock");
		$computer = mt_rand(0,4);

			if($_POST["game"] == "steen") {
				$player = 0;
			} else if($_POST["game"] == "papier") {
				$player = 1;
			} else if($_POST["game"] == "schaar") {
				$player = 2;
			} else if($_POST["game"] == "hagedis") {
				$player = 3;
			} else {
				$player = 4;
			}


			if($player == $computer) {
				echo "<h1 class='oranje'>Gelijkspel</h1>";
			} else if ($player == 0 && ($computer == 2 || $computer == 3)) {  //Steen wint van schaar, hagedis
				echo "<h1 class='groen'>Jij wint</h1>";
				$_SESSION["score"] += 1;
			} else if ($player == 1 && ($computer == 0 || $computer == 4)) {  //Papier wint van steen en spock
				echo "<h1 class='groen'>Jij wint</h1>";
				$_SESSION["score"] += 1;
			} else if ($player == 2 && ($computer == 1 || $computer == 3)) { //Schaar wint van papier, hagedis
				echo "<h1 class='groen'>Jij wint</h1>";
				$_SESSION["score"] += 1;
			} else if ($player == 3 && ($computer == 2 || $computer == 4)) { //Hagedis wint van papier en spock
				echo "<h1 class='groen'>Jij wint</h1>";
				$_SESSION["score"] += 1;
			} else if ($player == 4 && ($computer == 2 || $computer == 0)) { //Spock wint van schaar, steen
				echo "<h1 class='groen'>Jij wint</h1>";
				$_SESSION["score"] += 1;
			} else {
				echo "<h1 class='rood'>Computer wint</h1>";
			}
		echo "Computer: $sps[$computer] <br>";
		echo "Speler: $sps[$player] <br>";
	}
}
//Er is een sessie gevonden.
if(isset($_SESSION['user'])) { ?>
<p>Je huidige score is: <?php echo $_SESSION["score"]; ?></p>


	<form method="post">
	<button value="steen" name="game"><img src="steen.png"></button>
	<button value="papier" name="game"><img src="papier.png"></button>
	<button value="schaar" name="game"><img src="schaar.png"></button>
	<button value="hagedis" name="game"><img src="hagedis.png"></button>
	<button value="spock" name="game"><img src="spock.png"></button>

	</form>
	<form method="post">
	<button value="stop" name="stop">Stop met spelen</button>
	</form>


<?php } else {
//Er is geen sessie, dus we moeten er een aanmaken. ?>
<p>Er is op het moment geen spel gestart.</p>
<form method="post">
<button value="start" name="start">Start spel</button>

</form>


<?php } ?>

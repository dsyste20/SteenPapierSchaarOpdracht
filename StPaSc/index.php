<?php
session_start();

if(isset($_SESSION['scorecomp'])) {
    if ($_SESSION['scorecomp'] != NULL) {
        echo $_SESSION['scorecomp'];
    }
}
if(isset($_SESSION['scorespeler'])) {
    if ($_SESSION['scorespeler'] != NULL) {
        echo $_SESSION['scorespeler'];
    }
}
session_destroy();
?>
<html lang="nl-en">
<head>
    <title>Steen | Papier | Schaar</title>
</head>
<style>
    body {
        background-color: yellow;
        text-align: center;
    }
    input[type=text] {
        width: 15px;
        height: 20px;
    }
    button {
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 190px;
        width: 240px;
        background-color: transparent;
    }
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        height: 180px;
        width: 230px;
    }
    p {
        font-size: large;
    }
</style>
<body>
<h1>Steen | Papier | Schaar</h1>
<h4>Kies een:</h4>

<?php
  if(isset($_POST['keuze'])) {
    $computerarray = range(0,2);
    $computer = array_rand($computerarray);

    //echoën wat de speler kiest.
    switch($_POST['keuze']) {
        case 0: echo "<br>Jij koos voor STEEN en "; break;
        case 1: echo "<br>Jij koos voor PAPIER en "; break;
        case 2: echo "<br>Jij koos voor SCHAAR en "; break;
    }

    //echoën wat de computeer kiest.
    switch($computer) {
        case 0: echo "de computer koos voor STEEN <br>"; break;
        case 1: echo "de computer koos voor PAPIER <br>"; break;
        case 2: echo "de computer koos voor SCHAAR <br>"; break;
    }

    //Wanneer je steen kiest.
    if($_POST['keuze'] == 0 and $computer == 0) {
        echo "Gelijkspel <br>";
    }elseif($_POST['keuze'] == 0 and $computer == 1) {
        echo "You lost, Papier bedekt steen <br>";
    }elseif($_POST['keuze'] == 0 and $computer == 2) {
        echo "You won, Steen vernietigt schaar <br>";
    }

    //Wanneer je papier kiest.
    if($_POST['keuze'] == 1 and $computer == 1) {
        echo "Gelijkspel <br>";
    }elseif($_POST['keuze'] == 1 and $computer == 0) {
        echo "You won, Papier bedekt steen <br>";
    }elseif($_POST['keuze'] == 1 and $computer == 2) {
        echo "You lost, Schaar knipt papier <br>";
    }

    //Wanneer je schaar kiest.
    if($_POST['keuze'] == 2 and $computer == 2) {
        echo "Gelijkspel <br>";
    }elseif($_POST['keuze'] == 2 and $computer == 0){
        echo "You lost, Steen vernietigt schaar <br>";
    }elseif($_POST['keuze'] == 2 and $computer == 1) {
        echo "You won, Schaar knipt papier <br>";
    }

      if(!isset($_SESSION['score'])) {
          $scorespeler = 0;
          $scorecomp = 0;

          if ($_POST['keuze'] == 0 and $computer == 2 or $_POST['keuze'] == 1 and $computer == 0 or $_POST['keuze'] == 2 and $computer == 1) {
              $_SESSION['scorespeler']++;
              echo 'Speler: <input type="text" name="spelerscore" value="'
              if(isset($_SESSION['scorecomp'])) {
                  if ($_SESSION['scorecomp'] != NULL) {
                      echo $_SESSION['scorecomp'];
                  }
              } '" />';
              echo ' Computer: <input type="text" name="compscore" value="' . $_SESSION['scorecomp'] . '" />';
          } elseif ($_POST['keuze'] == 0 and $computer == 1 or $_POST['keuze'] == 1 and $computer == 2 or $_POST['keuze'] == 2 and $computer == 0) {
              $_SESSION['scorecomp']++;
              echo 'Speler: <input type="text" name="spelerscore" value="' . $_SESSION['scorespeler'] . '" />';
              echo ' Computer: <input type="text" name="compscore" value="' . $_SESSION['scorecomp'] . '" />';
          } else {
              echo 'Speler: <input type="text" name="spelerscore" value="' . $_SESSION['scorespeler'] . '" />';
              echo ' Computer: <input type="text" name="compscore" value="' . $_SESSION['scorecomp'] . '" />';
          }

//          if ($_SESSION['scorecomp'] == 5) {
//              $_SESSION['scorecomp'] = 0;
//              $_SESSION['scorespeler'] = 0;
//              echo "<br><p>Je hebt verloren! </p><form action='StPaSc%20versie%201.2.1.php' method='GET'><button value='PlayAgain' name='reset' style='background-color: darkorange; height: 50px; width: 100px'>Play again</button></form>";
//          } elseif ($_SESSION['scorespeler'] == 5) {
//              $_SESSION['scorecomp'] = 0;
//              $_SESSION['scorespeler'] = 0;
//              echo "<br><p>Je hebt gewonnen!!</p><form action='StPaSc%20versie%201.2.1.php' method='GET'><button value='PlayAgain' name='reset' style='background-color: darkorange; height: 50px; width: 100px'>Play again</button></form>";
//          }
      }
  }

?>
<form action="" method="POST">
    <button value="0" name="keuze"><img src="images/steen.gif"></button>
    <button value="1" name="keuze"><img src="images/papier.gif"></button>
    <button value="2" name="keuze"><img src="images/schaar.gif"></button>
</form>
</body>
</html>
<?php
//  create un file index.php in cui:
//  - è definita una classe ‘Movie’
//     => all'interno della classe sono dichiarate delle variabili d'istanza
//     => all'interno della classe è definito un costruttore
//     => all'interno della classe è definito almeno un metodo
//  - vengono istanziati almeno due oggetti ‘Movie’ e stampati a schermo i valori delle relative proprietà

class Movie
{

  public $title;
  public $originalTitle;
  public $type;
  public $reviews;

  function __construct($_title, $_originalTitle, $_type,  $_reviews = [])
  {
    $this->title = $_title;
    $this->originalTitle = $_originalTitle;
    $this->reviews = $_reviews;
    $this->type = $_type;
  }

  // La funzione che inserisce una nuova recensione all'interno dell'array di recensioni
  public function insertReview($_review)
  {
    $this->reviews[] = $_review;
  }

  public function getMovieName()
  {
    return "Titolo: " . $this->title . "</br>" . "Titolo Originale: " . $this->originalTitle;
  }

  public function getMovieType() {
    return $this->type;
  }

  public function getSticker() {

    if ($this->type === "Horror") {
      return "red";
    } else if ($this->type === "Action") {
      return "yellow";
    } else {
      return "green";
    }
  }

  public function getAverageReview()
  {
    $reviewsSum = 0;
    foreach ($this->reviews as $review) {
      $reviewsSum += $review;
    }
    $avgReview = $reviewsSum / count($this->reviews);
    return $avgReview;
  }
}

$RamboTheRevenge = new Movie("Rambo la vendetta", "Rambo the revenge", "Action");
$RamboTheRevenge->insertReview(2);
$RamboTheRevenge->insertReview(3);

$theHole = new Movie("Il buco", "The hole", "Horror");
$theHole->insertReview(3);
$theHole->insertReview(4);

$LifeIsBeautiful = new Movie("La vita è bella", "La vita è bella", "Dramatic");
$LifeIsBeautiful->insertReview(5);
$LifeIsBeautiful->insertReview(4);

$mickeyMouse = new Movie("Topolino", "Mickey Mouse", "Fantasy");
$mickeyMouse->insertReview(2);
$mickeyMouse->insertReview(5);
$mickeyMouse->insertReview(4);

$theGreatGatsby = new Movie("Il grande Gatsby", "The great Gatsby", "Romantic");
$theGreatGatsby->insertReview(3);
$theGreatGatsby->insertReview(2);
$theGreatGatsby->insertReview(1);

$movieList = [];
$movieList[] = $RamboTheRevenge;
$movieList[] = $theHole;
$movieList[] = $LifeIsBeautiful;
$movieList[] = $mickeyMouse;
$movieList[] = $theGreatGatsby;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- css  -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <ul>
    <?php foreach ($movieList as $movie) { ?>
      <li>
        <h2>
          <?php echo $movie->getMovieName(); ?>
        </h2>
        <p>Voto medio: <?php echo $movie->getAverageReview(); ?></p>
        <p>Genere: <?php echo $movie->getMovieType()?> <span class="sticker <?php echo $movie->getSticker() ?>"></span></p>
      </li>
    <?php } ?>
  </ul>

</body>

</html>
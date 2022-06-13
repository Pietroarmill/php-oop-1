


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
    public $reviews;

    function __construct($_title, $_originalTitle, $_reviews = [])
    {
        $this->title = $_title;
        $this->originalTitle = $_originalTitle;
        $this->reviews = $_reviews;
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

$RamboTheRevenge = new Movie("Rambo la vendetta", "Rambo the revenge");
$RamboTheRevenge->insertReview(2);
$RamboTheRevenge->insertReview(3);

$theHole = new Movie("Il buco", "The hole");
$theHole->insertReview(3);
$theHole->insertReview(4);

$LifeIsBeautiful = new Movie("La vita è bella", "La vita è bella");
$LifeIsBeautiful->insertReview(5);
$LifeIsBeautiful->insertReview(4);

$mickeyMouse = new Movie("Topolino", "Mickey Mouse");
$mickeyMouse->insertReview(2);
$mickeyMouse->insertReview(5);
$mickeyMouse->insertReview(4);

$theGreatGatsby = new Movie("Il grande Gatsby", "The great Gatsby");
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

<ul>
    <?php foreach ($movieList as $movie) { ?>
        <li>
            <h2>
                <?php echo $movie->getMovieName(); ?>
            </h2>
            <p>Voto medio: <?php echo $movie->getAverageReview(); ?></p>
        </li>
    <?php } ?>
</ul>

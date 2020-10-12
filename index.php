<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css" />
    <title>Document</title>
</head>

<body>
    <?php
    $cup = array("regularCup", "mediumCup", "largeCup", "extraLargeCup");
    $total_cost = 0;
    $cost = 0;
    $cost_sugar = 0;
    $cost_cream = 0;
    $cup_size_cost = 0;

    echo "<h1 id='summary'>Thanks for your order. Here it is: </h1>";

    if (isset($_POST["no_of_coffees"], $_POST["creams"], $_POST["sugars"], $_POST['Order'])) {
        $no_of_coffees = $_POST['no_of_coffees'];
        $cream = $_POST["creams"];
        $sugar = $_POST['sugars'];
        $order = $_POST['Order'];

        for ($x = 1; $x <= $no_of_coffees; $x++) {
            echo "<section class='phpSec1'>";
            for ($i = 0; $i < 4; $i++) {
                $order == "$cup[$i]";
                if ($i == 1) {
                    echo "<img class='$order' src='images/cup.jpg'>";
                }
                if ($i == (array_search($order, $cup))) {
                    $cup_size_cost = $i + 1.2;
                }
            }
            for ($y = 1; $y <= $sugar; $y++) {
                if ($y == 1) {
                    echo "<img src='images/plus.jpg'>";
                }
                echo "<img src='images/sugar.jpg'>";
            }
            for ($z = 1; $z <= $cream; $z++) {
                if ($z == 1) {
                    echo "<img src='images/plus.jpg'>";
                }
                echo "<img src='images/cream.jpg'>";
            }
            echo "</section><br>";
        }
        $cost_cream = $cream * 0.88;
        $cost_sugar = $sugar * 0.50;
        $cost = $cost_cream + $cost_sugar + $cup_size_cost;
        $tax = round(0.05 * $cost * $no_of_coffees);
        $total_cost = ($cost * $no_of_coffees) + $tax;
        echo "Cost: $cost x $no_of_coffees + tax = $total_cost";
    }

    if (isset($_POST['no_of_slang_coffees'], $_POST['slangOrder'], $_POST['coffee'])) {
        $no_of_slang_coffees = $_POST["no_of_slang_coffees"];
        $slangOrder = $_POST["slangOrder"];
        $coffee = $_POST["coffee"];

        for ($x = 1; $x <= $no_of_slang_coffees; $x++) {
            echo "<section class='phpSec1'>";
            for ($i = 0; $i < sizeof($cup); $i++) {
                $slangOrder == "$cup[$i]";
                if ($i == 1) {
                    echo "<img class='$slangOrder' src='images/cup.jpg'>";
                }
                if ($i == (array_search($slangOrder, $cup))) {
                    $cup_size_cost = $i + 1.2;
                }
            }
            $t = 0;
            $s = 0;
            if ($coffee == "regular") {
                $t = 1;
                $s = 1;
            } else if ($coffee == "double") {
                $t = 2;
                $s = 2;
            } else if ($coffee == "triple") {
                $t = 3;
                $s = 3;
            } else if ($coffee == "black_one_sugar") {
                $s = 1;
            } else if ($coffee == "black_two_sugars") {
                $s = 2;
            } else if ($coffee == "black_three_sugars") {
                $s = 3;
            }
            for ($y = 1; $y <= $s; $y++) {
                if ($y == 1) {
                    echo "<img src='images/plus.jpg'>";
                }
                echo "<img src='images/sugar.jpg'>";
            }
            for ($z = 1; $z <= $t; $z++) {
                if ($z == 1) {
                    echo "<img src='images/plus.jpg'>";
                }
                echo "<img src='images/cream.jpg'>";
            }
            echo "</section><br>";
            $cost_cream = 0.88 * $t;
            $cost_sugar = 0.50 * $s;
        }
        $cost = $cost_cream + $cost_sugar + $cup_size_cost;
        $tax = round(0.05 * $cost * $no_of_slang_coffees);
        $total_cost = $cost * $no_of_slang_coffees + $tax;
        echo "Cost: $cost x $no_of_slang_coffees + tax = $total_cost";
    }
    ?>
</body>

</html>
<?php

$variable = 1;

function x(): void {
    $variable = 2;
}

echo $variable; // prints 1

x();

echo $variable; // prints 1

function y()
{
    global $variable;

    $variable = 2;
}

y();

echo $variable; // prints 2

require './lib.php';

global $someRandomVar;

echo $someRandomVar;

z();

// arrays

$arr = [1,2,3,4,5,'a','b']; // array

foreach ($arr as $item) {
    echo "{$item} <br>";
}

foreach (range(1, 20) as $item) {
    echo $item;
}

echo "<br>";

foreach ($arr as $key => $value) {
    echo "{$key} => {$value} <br />";
}

$assocArr = [
    'k1' => 'v1',
    'k2' => 'v2',
    'kremówka' => 'papież',
    '21' => '37',
    2137 => 'barka'
];

foreach ($assocArr as $item) {
    echo "{$item} <br>";
}

foreach ($assocArr as $k => $v) {
    echo "{$k} => {$v} <br>";
}

foreach ($assocArr as $k => $v) {
    echo sprintf("%s => %s <br>", $k, $v);
}

$arrOfArrs = [
    [
        '1',
        '2',
        '3'
    ],
    [
        'a',
        'b',
        'c'
    ],
];

echo "<br>";

var_dump($arrOfArrs);

echo "<br>";

foreach ($arrOfArrs as $arr) {
    foreach ($arr as $item) {
        echo "{$item} <br>";
    }
}

?>

<table border="1">
    <?php
    foreach ($arrOfArrs as $row) {
        echo "<tr>";
        foreach ($row as $item) {
            echo "<td>{$item}</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

<?php

for ($i = 0; $i < count($arrOfArrs); ++$i) {
    // todo
}

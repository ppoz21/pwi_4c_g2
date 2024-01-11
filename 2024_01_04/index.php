<?php

//require_once 'Dog.php';
//
//$burek = new Dog(
//    'Burek',
//    'Mieszaniec',
//    5,
//    'brązowy',
//    'John'
//);
//
//$burek->bark();
//
//echo '<br>' . $burek->getName();
//
//echo '<br>';
//
//var_dump($burek);
//
//echo '<br>';

require_once 'Database.php';

$db = new Database(
    '127.0.0.1',
    'root',
    'root',
    'sprawdzian_node_v5'
);

//var_dump($db->getCars());

var_dump($db->getCar(1));
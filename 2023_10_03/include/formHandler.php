<?php

if (!isset($_POST['submit'])) {
    header('Location: ../');

    die;
}

if (!isset($_POST['email'], $_POST['message'])) {
    header("Location: ../contact.php?error=1");

    die;
}

if (empty($_POST['email']) || empty($_POST['message'])) {
    header("Location: ../contact.php?error=2");

    die;
}

if (strlen($_POST['message']) < 20) {
    header("Location: ../contact.php?error=3");

    die;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../contact.php?error=4");

    die;
}

$email = $_POST['email'];
$message = $_POST['message'];

// TODO: save to DB

header("Location: ../contact.php?success=1");

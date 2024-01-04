<?php

$conn = new mysqli(
    '127.0.0.1',
    'root',
    'root',
    'zdupy',
    3306
);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function insertMessage(string $message): void
{
    global $conn;

    $message = $conn->real_escape_string(
        htmlspecialchars(
            strip_tags($message)
        )
    );

    $sql = "INSERT INTO messages (content) VALUES ('$message')";
    $conn->query($sql);
}

function getMessages(): array
{
    global $conn;

    $sql = "SELECT * FROM messages";
    $result = $conn->query($sql);

    $messages = [];

    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }


    return $messages;
}

function getMessageById(int $id): array
{
    global $conn;

    $id = $conn->real_escape_string($id);

    $sql = "SELECT * FROM messages WHERE id = $id";

    var_dump($sql);

    $result = $conn->query($sql);

    return $result->fetch_assoc();
}
<?php

/* - to jest najprostsza wersja pod egzamin

$conn = mysqli_connect(
    '127.0.0.1',
    'php',
    'php',
    'homepage',
    3306
);

// check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_errno();
    die;
} else {
    echo "Connection successful";
}

*/

// wersja obiektowa
$conn = new mysqli(
    '127.0.0.1',
    'php',
    'php',
    'homepage',
    3306
);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL" . $conn->connect_errno;
    die;
}

function storeMessage(string $email, string $message): bool
{
    global $conn;

    $result = $conn->query(
        sprintf(
            'INSERT INTO contact_messages (email, message) values ("%s", "%s")',
            $email,
            $message
        )
    );

    $conn->close();

    return $result;
}

function findAdminByLogin(string $login): ?array
{
    global $conn;

    $query = sprintf(
        'SELECT * FROM admin WHERE login = "%s" LIMIT 1',
        $login
    );

    $result = $conn->query($query);

    if ($row = $result->fetch_assoc())
    {
        $result->free_result();

        return $row;
    }

    return null;
}

function getContactMessages(): array
{
    global $conn;

    $messages = [];

    $sql = 'SELECT * FROM contact_messages';

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    $result->free_result();

    return $messages;
}
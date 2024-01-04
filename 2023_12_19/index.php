<?php
    require_once './db.php';

    if (isset($_POST['content'])) {
        insertMessage($_POST['content']);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <form method="post">
        <textarea name="content"></textarea>
        <button type="submit">Send</button>
    </form>
</div>

<div>
    <form method="post">
        <input type="number" name="userId" />
        <button type="submit">Get Message</button>
    </form>
</div>

<div>
    Single:
    <?php
        if (isset($_POST['userId'])) {
            $message = getMessageById($_POST['userId']);
            echo "<div>{$message['content']}</div>";
        }
    ?>
</div>

<div>
    All:
    <?php
        foreach (getMessages() as $message) {
            echo "<div>{$message['content']}</div>";
        }
    ?>
</div>

</body>
</html>
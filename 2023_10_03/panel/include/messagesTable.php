<?php

global $messagesArr;

?>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>E-mail</td>
        <td>Message</td>
        <td>Created at</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($messagesArr as $message):
    ?>
    <tr>
        <td><?= $message['id'] ?></td>
        <td><?= $message['email'] ?></td>
        <td><?= $message['message'] ?></td>
        <td><?= $message['created_at'] ?></td>
    </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

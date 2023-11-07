<?php
session_start();

require_once '../include/db.php';

$messagesArr = getContactMessages();

if (!isset($_SESSION['admin_name'])) {
    header('Location: ./panel/login.php');
    die;
}

$title = 'Panel administracyjny';
$activePage = 'home';
?>
<!doctype html>
<html lang="pl">
<?php
require_once '../include/head.php';
?>
<body>
<div class="container-fluid p-0">
    <?php
    require_once './include/nav.php'
    ?>
    <div class="container py-5">
        <h1>New contact messages</h1>
        <div class="table-responsive">
            <?php
            include_once './include/messagesTable.php';
            ?>
        </div>

        <?php
        include_once './include/messagesGrid.php';
        ?>
    </div>
</div>
</body>
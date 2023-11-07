<?php
session_start();

require_once '../include/db.php';

$messagesArr = getContactMessages();

if (!isset($_SESSION['admin_name'])) {
    header('Location: ./login.php');
    die;
}

require_once './include/DisplayStyle.php';

$cookieName = 'display_style';

if (!isset($_COOKIE[$cookieName])) {
    setcookie(
        $cookieName,
        DisplayStyle::Table->value,
        time() + (86400 * 30),
        "/panel"
    );
    $cookieValue = DisplayStyle::Table->value;
} else {
    $cookieValue = $_COOKIE[$cookieName];
}

if (isset($_POST['display-style'])) {
    setcookie(
        $cookieName,
        $_POST['display-style'],
        time() + (86400 * 30),
        "/panel"
    );
    $cookieValue = $_POST['display-style'];
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

        <div class="row mb-3">
            <div class="col-12">
                <form action="./" method="post" id="display-form">
                    <input type="radio" class="btn-check" name="display-style" id="style-table" autocomplete="off" <?= $cookieValue === DisplayStyle::Table->value ? 'checked' : '' ?> value="<?= DisplayStyle::Table->value ?>">
                    <label class="btn btn-outline-primary" for="style-table">Table</label>

                    <input type="radio" class="btn-check" name="display-style" id="style-grid" autocomplete="off" <?= $cookieValue === DisplayStyle::Grid->value ? 'checked' : '' ?> value="<?= DisplayStyle::Grid->value ?>">
                    <label class="btn btn-outline-primary" for="style-grid">Grid</label>
                </form>
            </div>
        </div>

        <?php
        switch ($cookieValue) {
            case DisplayStyle::Table->value:
                include_once './include/messagesTable.php';
                break;
            case DisplayStyle::Grid->value:
                include_once './include/messagesGrid.php';
                break;
        }
        ?>
    </div>
</div>
<script>
    const switchElems = document.querySelectorAll('input[name=display-style]')

    switchElems.forEach(elem => {
        elem.addEventListener('change', () => {
            const form = document.querySelector('#display-form')
            form.submit()
        })
    })
</script>
</body>
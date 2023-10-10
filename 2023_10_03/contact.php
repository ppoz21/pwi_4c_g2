<?php
$title = 'Kontakt';
$activePage = 'contact';
require_once './include/functions.php';

$errorMessage = null;

if (isset($_GET['error'])) {
    $error = $_GET['error'];

    /*
    switch ($error) {
        case '1':
            $errorMessage = 'W formularzu brakuje danych';
            break;
        case '2':
            $errorMessage = 'Adres e-mail i/lub treść wiadomości nie mogą być puste!';
            break;
        case '3':
            $errorMessage = 'Wiadomość musi mieć minimum 20 znaków';
            break;
        case '4':
            $errorMessage = 'Podano niepoprawny adres e-mail';
            break;
    }
    */

    $errorMessage = match($error) {
        '1' => 'W formularzu brakuje danych',
        '2' => 'Adres e-mail i/lub treść wiadomości nie mogą być puste!',
        '3' => 'Wiadomość musi mieć minimum 20 znaków',
        '4' => 'Podano niepoprawny adres e-mail',
        default => null
    };
}

?>
<!doctype html>
<html lang="pl">
<?php
require_once './include/head.php';
?>
<body>
<div class="container-fluid p-0">
    <?php
    require_once './include/nav.php'
    ?>
    <div class="container py-5">
        <?php
        echo renderHeader($title, 1);

        if (isset($_GET['success'])):
        ?>
            <div class="mb-3">
                <div class="alert alert-success">
                    Twoja wiadomość została wysłana
                </div>
            </div>
        <?php
        else:
        ?>
        <form id="contact-form" method="post" action="./include/formHandler.php">
            <?php
                if ($errorMessage):
            ?>
            <div class="mb-3">
                <div class="alert alert-danger">
                    <?php
                        echo $errorMessage;
                    ?>
                </div>
            </div>
            <?php
                endif;
            ?>
            <div class="mb-3">
                <label for="email" class="form-label">Adres e-mail</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Wiadomość</label>
                <textarea name="message" id="message" rows="10" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Wyślij</button>
        </form>
        <?php
        endif;
        ?>
    </div>
    <?php
    require_once './include/footer.php'
    ?>
</div>
<!--<script src="./public/js/preventContact.js"></script>-->
</body>
</html>

<?php
    $title = 'Strona główna';
    $activePage = 'home';
    require_once './include/functions.php';
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
            ?>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis exercitationem laudantium nemo numquam praesentium quidem quo. Ad ea minus molestiae saepe? Accusamus ad aperiam aut autem beatae consequatur distinctio dolorem ducimus eaque eos esse eveniet, ex excepturi fugit iste itaque minus nam, nostrum nulla odio optio porro quia quibusdam quis quisquam recusandae sapiente sint unde voluptas voluptatum. Ab aliquam aspernatur aut blanditiis, facilis fuga fugit harum iure laudantium maiores molestiae non quaerat quam sed sint ut voluptatem, voluptatibus! Ab aperiam blanditiis, consectetur cupiditate ducimus ex fugit impedit ipsa ipsam laboriosam nesciunt porro possimus quis quod repellat sapiente sit tempora tempore?
            </p>
        </div>
        <?php
        require_once './include/footer.php'
        ?>
    </div>
</body>
</html>

<?php
session_start();

if (isset($_SESSION['admin_name'])) {
    header('Location: ./');
    die;
}

if (isset($_POST['login'], $_POST['username'], $_POST['pass'])) {
    include '../include/db.php';

    $uname = $_POST['username'];
    $pass = $_POST['pass'];

    $adminData = findAdminByLogin($uname);

    if ($adminData) {
        $hashedPass = hash('sha256', $pass);

        if ($hashedPass === $adminData['password']) {
            $_SESSION['admin_name'] = $adminData['name'];

            header('Location: ./');
            die;
        }
    }
}

$title = 'Panel administracyjny | Logowanie';

?>
<!doctype html>
<html lang="pl">
<?php
require_once '../include/head.php';
?>
<body>
<div class="container-fluid p-0">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Zaloguj się do Panelu</h1>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Login</label>
                                <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Hasło</label>
                                <input type="password" class="form-control" id="pass" name="pass" required autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Zaloguj się</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php
    global $activePage;
?>

<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage === 'home'): echo 'active'; endif; ?>" href="/">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage === 'about'): echo 'active'; endif; ?>" href="/about-us.php">O nas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage === 'contact'): echo 'active'; endif; ?>" href="/contact.php">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!--HEADER-->
<header>
    <div class="content">
        <div class="head">
            <div class="head-logo">
                <a href="index.php"><img src="assets/media/header/logo.png" alt="#"></a>
                <a href="index.php">Archipro</a>
            </div>
            <ul class="menu">
                <li><a class="menuItem" href="?page=uslugi">Услуги</a></li>
                <li><a class="menuItem" href="?page=about-us">О нас</a></li>
                <li><a class="menuItem" href="#contacts">Контакты</a></li>

                <?php
                if (isset($_SESSION['user'])) { ?>
                    <form action="actions/logout.php" method="post">
                        <button style="border:none; font-size:27px; background:none" type="submit"
                            class="button-fill">Выход</button>
                    </form>
                <?php } else { ?>
                    <li class="head-person"><a class="menuItem" class="head-person" href="?page=entry"><img
                                src="assets/media/header/person.png" alt="#"></a></li>
                    <li class="person-white"><a class="menuItem" href="?page=entry"><img
                                src="assets/media/header/person-2.png" alt="#"></a></li>
                <?php }
                ?>


                <?php
                if (isset($_SESSION['user']) && (int) $_SESSION['user']['role_id'] === 2) {
                    ?>
                    <li class="head-person"><a class="menuItem" class="head-person" href="?page=admin"><img
                                src="assets/media/header/person.png" alt="#"></a></li>
                    <li class="person-white"><a class="menuItem" href="?page=admin"><img
                                src="assets/media/header/person-2.png" alt="#"></a></li>
                    <?php
                }
                ?>

                <?php
                if (isset($_SESSION['user']) && (int) $_SESSION['user']['role_id'] === 1) {
                    ?>
                    <li class="head-person"><a class="menuItem" class="head-person"
                            href="?page=private-kab"><img src="assets/media/header/person.png"
                                alt="#"></a></li>
                    <li class="person-white"><a class="menuItem" href="?page=private-kab"><img
                                src="assets/media/header/person-2.png" alt="#"></a></li>
                    <?php
                }
                ?>
            </ul>
            <button class="burger">
                <i class="menuIcon material-icons">menu</i>
                <i class="closeIcon material-icons">close</i>
            </button>
        </div>
    </div>
</header>
<!--HEADER-->
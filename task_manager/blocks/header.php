<header>
<nav>
                <ul class="nav__left">
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="add_task.php">Добавить задачу</a></li>
                </ul>
                <ul class="nav__right">
                    <li>Добро пожаловать, <?php echo $_SESSION['username']; ?></li>
                    <li><a href="auth.php" class="btn">Выйти</a></li>
                </ul>
            </nav>
</header>
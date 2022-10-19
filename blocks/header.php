<header>
<nav>
                <ul class="nav__left">
                    <li><a href="1index.php">Главная</a></li>
                    <li><?php if(checkRule() >= 60): ?><a href="add_task.php">Добавить задачу</a></li>
                        <?php endif; ?>
                    <li><a href="reviews.php">Отзывы</a></li>
                    <li><?php if(checkRule() >= 60): ?><a href="../admin/admin.php">Админ панель</a></li>
                        <?php endif; ?>
                </ul>
                <ul class="nav__right">
                    <li>Добро пожаловать, <?php echo $_SESSION['name']; ?></li>
                    <li><a href="auth.php" class="btn">Выйти</a></li>
                </ul>
            </nav>
</header>
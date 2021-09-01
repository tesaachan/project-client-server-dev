<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Регистрация</title>
    <link rel="stylesheet" href="../styles/reg-styles.css">
    <script src="../scripts/js-script.js"></script>
</head>
<body>
<header>
    <h1>
        tesablog
    </h1>
</header>
<main>
    <div class="main-page">
        <a class="back-button" href="../index.php">
            <img src="../img/back-button.png" alt="Вернуться назад">
        </a>
        <div class="main-title">
            Регистрация
        </div>
        <div class="reg-form">
            <div class="labels">
                <label>
                    Придумайте логин
                </label>
                <label>
                    Придумайте пароль
                </label>
            </div>
            <form action="reg.php" id="registration" method="post">
                <input class="type-text" type="text" placeholder=" user228" name="login">
                <input class="type-text" type="password" placeholder=" Qwerty123" name="password">
                <input class="type-text" type="password" placeholder=" Повторите пароль" name="confirm">
            </form>
        </div>
        <input class="button" type="submit" value="Зарегистрироваться" form="registration" name="insert">
        <?php
        if (isset($_POST['insert'])) {
            $table_name = 'users';

            $new_login = $_POST['login'];

            $new_password = $_POST['password'];

            $confirm = $_POST['confirm'];

            function OpenConnection()
            {
                $Open = new mysqli('localhost', 'u1377351_tesaria', 'rteJ0pp8', 'u1377351_database');
                return $Open;
            }

            function CloseConnection($Open)
            {
                $Open->close();
            }

            if ($confirm == $new_password) {
                if ((strlen($new_password) > 3) && (strlen($new_login) > 2)) {
                    $Open = OpenConnection();

                    $query = "INSERT INTO users (Login, Password) VALUES ('$new_login', '$new_password');";

                    $result = $Open->query($query);

                    if ($result) {
                        echo "<div class='response' style='background-color: #e5f7ff'>Регистрация прошла успешно</div>";
                    } else {
                        echo "<div class='response'>Регистрация не завершена</div>";
                    }
                    CloseConnection($Open);
                } else {
                    echo "<div class='response' style='background-color: #ffdddd;'>Логин и/или пароль слишком короткие</div>";
                }
            } else {
                echo "<div class='response' style='background-color: #ffdddd;'>Пароль не совпадает</div>";
            }
        }
        ?>
    </div>
</main>
</body>
</html>


<?php
include('content/config.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db, "select login from users where login = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['login'];

//if (!isset($_SESSION['login_user'])) {
//    header("location:login.php");
//    die();
//}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <meta property="og:title" content="tesablog: Главная страница" />
    <meta property="vk:image"  content="http://tesablog.space/img/vk-image.png" />
    <title>Главная странциа</title>
    <link rel="icon" href="img/logo.png" type="image/png" sizes="256x256">
    <link rel="stylesheet" href="styles/index-styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="script" href="scripts/js-script.js">
    <script src="scripts/js-script.js"></script>
    <script src="scripts/date-tt-RU.js" type="text/javascript"></script>
</head>
<body>
<header>
    <h1>
        tesablog
    </h1>
    <label id="account-name" for="account-page-button">Войти</label>
    <label class="account-page-icon" for="account-page-button">
        <img src="img/account.png" alt="Войти в аккаунт">
    </label>
</header>
<input type="checkbox" id="account-page-button">
<div class="account-page">
    <div class="account-box">
        <label class="account-close-form" for="account-page-button">
            <img src="img/closing-cross.png" alt="Закрыть">
        </label>
        <div class="account-box-title">
            Войдите в аккаунт
        </div>
        <form action="index.php" method="post">
            <input class="inputing" type="text" placeholder=" Логин" name="login">
            <input class="inputing" type="password" placeholder=" Пароль" name="password">
            <input class="account-enter-button" type="submit" value="Войти">
        </form>
        <?php
        //        include('content/config.php');
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form

            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'u1377351_tesaria');
            define('DB_PASSWORD', 'rteJ0pp8');
            define('DB_DATABASE', 'u1377351_database');
            $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

            $myusername = mysqli_real_escape_string($db, $_POST['login']);
            $mypassword = mysqli_real_escape_string($db, $_POST['password']);

            $sql = "SELECT id FROM users WHERE login = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];

            $count = mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row

            if($count == 1) {
                session_start();
                $_SESSION['login_user'] = $myusername;
                echo "<script>document.getElementById('account-name').innerText = '" . $myusername . "'</script>";
            } else {
                $error = "Your Login Name or Password is invalid";
            }
        }

        //        if (isset($_POST['account-enter-button'])) {
        //            $login = $_POST['login'];
        //            $password = $_POST['password'];
        //
        //            function OpenConnection()
        //            {
        //                $Open = new mysqli('localhost', 'u1377351_tesaria', 'rteJ0pp8', 'u1377351_database');
        //                return $Open;
        //            }
        //
        //            function CloseConnection($Open)
        //            {
        //                $Open->close();
        //            }
        //
        //            $Open = OpenConnection();
        //
        //            $query = "";
        //
        //            $result = $Open->query($query);
        //
        //        }
        ?>
        <div class="account-create-new">
            Или
            <a href="content/reg.php">зарегистрируйтесь</a>
        </div>
    </div>
</div>
<main>
    <div class="main-page">
        <div class="main-title">Статьи</div>
        <div class="main-content">
            <ul>
                <li>
                    <a class="one-of-articles" href="content/articles/Oakleybook.php">
                        <div>
                            <div class="date">
                                <div class="date-number">12</div>
                                <div class="date-month">мая</div>
                            </div>
                            <div class="content-title">
                                КОНСПЕКТ КНИГИ «ДУМАЙ КАК МАТЕМАТИК»
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="one-of-articles soon" href="">
                        <div>
                            <div class="date soon">
                                <div class="date-number">25</div>
                                <div class="date-month">мая</div>
                            </div>
                            <div class="content-title">
                                ЧТО ПОСМОТРЕТЬ В ПОДМОСКОВЬЕ
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="one-of-articles soon" href="">
                        <div>
                            <div class="date soon">
                                <div class="date-number">27</div>
                                <div class="date-month">мая</div>
                            </div>
                            <div class="content-title">
                                КАК Я ВЕДУ ПИСЬМЕННЫЕ КОНСПЕКТЫ
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-comments">
        <div class="main-title">Объявления</div>
        <div class="block-comments" id="block-comments">
            <div class="comment">
                <div class="comment-author-name">somebody</div>
                <div class="comment-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem earum et in ipsum numquam perferendis quaerat sed sequi unde vel! Eius id illum libero, necessitatibus non odit quisquam tempora voluptatem.
                </div>
                <div class="comment-date">01.01.2021</div>
                <div class="comment-likes">
                    <img src="img/likeheart.png" alt="Лайки" onclick="newLike('like1')">
                    <span class="comment-likes-amount" id='like1'>0</span>
                </div>
            </div>
            <?php
            $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

            // $query1 = mysqli_query($db, "SELECT * FROM comments");
            $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            mysqli_set_charset($conn, "utf8");


            // $myrow = mysqli_fetch_array($query1);
            $sql = "SELECT * FROM comments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='comment'>" .
                        "<div class='comment-author-name'>" . $row['Author'] . "</div>" .
                        "<div class='comment-text'>" . $row['Text'] . "</div>" .
                        "<div class='comment-date'>" . $row['Date'] . "</div>" .
                        "<div class='comment-likes'>" .
                        "<img src='img/likeheart.png' alt='Лайки'>" .
                        "<span class='comment-likes-amount'>" . 0 . "</span>" .
                        "</div>" .
                        "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            // while ($row=mysqli_fetch_array($query1)) {
            //     echo "<div class='comment'>" .
            //             "<div class='author-name'>" . $row['Author'] . "</div>" .
            //             "<div class='comment-text'>" . $row['Text'] . "</div>" .
            //             "<div class='comment-date'>" . $row['Date'] . "</div>" .
            //             "<div class='comment-likes'>" .
            //                 "<img src='img/likegeart.png' alt='Лайки'>" .
            //             "<span class='comment-likes-amount'>" . 0 . "</span>" .
            //             "</div>" .
            //         "</div>";
            // }
            // mysqli_close($db)
            ?>
        </div>
        <div class="new-comment">
            <div class="new-comment-title">
                Новое объявление:
            </div>
            <form action="content/send_comment.php" method="post">
                <label class="new-comment-type" for="new-comment-typing">
                    <textarea  name="comment" id="new-comment-typing" rows="5" maxlength="180" onkeyup="memo_onkeyup()"></textarea>
                </label>
                <input type="text" name="commentt" id="commentt" style="display: none">
                <input type="text" name="date" id="datee" style="display: none">
                <input type="text" name="author" id="authorr" style="display: none">
                <div class="submitting">
                    <input class="comment-button" type="submit" value="Отправить" name="send_comment" onclick="myFunc()">
                    <span id="number-of-char">0/180</span>
                </div>
            </form>
        </div>
    </div>
</main>
<footer>
    <div class="footer-box info">
        Курсовой проект по "РКСП" студента института ИТКН Тесарян Георгия
    </div>
    <div class="footer-box contact">
        Контакты:
        <ul>
            <li>
                INST, VK: @tesaachan
            </li>
            <li>
                e-mail: <a href="mailto:sylae@yahoo.com">sylae@yahoo.com</a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>






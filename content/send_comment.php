<?php
if (isset($_POST['send_comment'])) {

    $author = $_POST['author'];

    if ($author != 'Войти') {
        $text = $_POST['commentt'];
        $date = $_POST['date'];

        function OpenConnection()
        {
            $Open = new mysqli('localhost', 'u1377351_tesaria', 'rteJ0pp8', 'u1377351_database');
            return $Open;
        }

        function CloseConnection($Open)
        {
            $Open->close();
        }

        $Open = OpenConnection();
        mysqli_set_charset($Open, "CP1251");

        $query = "INSERT INTO comments (Author, Text, Date) VALUES ('$author', '$text', '$date');";

        $result = $Open->query($query);

        CloseConnection($Open);
    }
}

?>

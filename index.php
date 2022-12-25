<?php
    // error_reporting(0);
    date_default_timezone_set('Europe/Moscow');
    include "connection.php";
    include "functions.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TalkAndStuff</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>
            <div class = 'top'>
                <div class='centerhead'><p>Text&Stuff</p><br>
                </div>
            </div>
        </h1>
    <div class='center'>
    <?php
            global $page_count;
            echo "<br><form method='POST' action='".setComment()."'>
            <input type ='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <a>Заголовок:</a><br><textarea name='msg_title' style = 'height: 20px; width: 200px'></textarea><br><br>
            <a>Текст сообщения:</a><br><textarea name='msg_text'></textarea><br><br>
            <button type='submit' name='commentSubmit'></button><br><br>";
            
        ?>
        </form>
    </div>
    <br>
    <div class = 'center' > 
        <br><div class = 'centertext' >
            Последние 100 анонимных сообщений
        </div><br>
        <?php 
            echo "<form method='POST' action='".getComments($con)."'>
            </form>";
            ?>
    </div>
    <br>


    </body>
</html>
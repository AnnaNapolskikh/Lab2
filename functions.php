<?php

function setComment() {
    require("connection.php");
    if(isset($_POST['commentSubmit'])) {
        $date = $_POST['date'];
        $title = $_POST['msg_title'];
        $message = $_POST['msg_text'];
        if (!empty($title) && !empty ($message)) {
            $date = $_POST['date'];
            $title = $_POST['msg_title'];
            $message = $_POST['msg_text'];
            $query = "INSERT INTO messages (date, msg_title, msg_text) VALUES ('$date', '$title', '$message')";
            $result = mysqli_query($con, $query);
        }
        else {
            echo "<br><b><div class ='comment'>Для отправки сообщения необходимо заполнить обе ячейки.</div></b>";
        }
    }
}

function getComments($page_count) {
    require("connection.php");
    $query = "SELECT * FROM messages ORDER BY msg_id DESC LIMIT 100";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {   
        echo "<div class='comment'>
                <div> Написано <b>Анонимным пользователем</b> в <i>".$row['date']."</i><br><br><b>".$row['msg_title']."</b></div>";

        echo " <div>".$row["msg_text"]."</div>";

        echo "<div><br><form method='POST' action='".likeSubmit($row)."'>  <button type='submit' name='".$row['msg_id']."' class='like_button'></button>  <br>Понравилось: ".$row["likes"]."</form></div>

        <div><form method='POST' action='".dislikeSubmit($row)."'>  <button type='submit' name='".$row['msg_id']."' class='dislike_button'></button>Не понравилось: ".$row["dislikes"]."</form></div>

        </div><br>";
    }
}

function likeSubmit($row) {
    require("connection.php");
    if(isset($_POST[$row['msg_id']])) {
        $id = $row['msg_id'];
        $likes = $row['likes']+1;
        $query = "UPDATE messages SET likes = '$likes' WHERE msg_id = '$id'";
        $result = mysqli_query($con, $query);
        header('Location: index.php');
        exit;
    }
}

 function dislikeSubmit($row) {
    require("connection.php");
    if(isset($_POST[$row['msg_id']])) {
        $id = $row['msg_id'];
        $dislikes = $row['dislikes']+1;
        $query = "UPDATE messages SET dislikes = '$dislikes' WHERE msg_id = '$id'";
        $result = mysqli_query($con, $query);
        header('Location: index.php');
        exit;
    }
 }

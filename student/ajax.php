<?php
include_once 'session.php';

if ($_POST['action'] == 'like') {
    $postid = $_POST['post_id'];
    if (mysqli_query($conn, "INSERT INTO likes VALUES(NULL, '$postid', '$usertype', '$userid', NULL)")) {
        echo true;
    }
}

if ($_POST['action'] == 'unlike') {
    $postid = $_POST['post_id'];
    if (mysqli_query($conn, "DELETE FROM likes WHERE `post_id`='$postid' AND `liker_id`='$userid' AND `liker_type`='$usertype'")) {
        echo true;
    }
}

if ($_POST['action'] == 'comment') {
    $postid = $_POST['post_id'];
    $comment = $_POST['comment'];
    if (mysqli_query($conn, "INSERT INTO comments VALUES(NULL, '$postid', '$usertype', '$userid', '$comment', NULL)")) {
        echo true;
    }
}

if ($_POST['action'] == 'message') {
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];
    if (mysqli_query($conn, "INSERT INTO `message` VALUES(NULL, '$sender', '$receiver', '$message', NULL)")) {
        $query = mysqli_query($conn, "SELECT * FROM `message` WHERE `sender`='$sender' AND `receiver`='$receiver' ORDER BY `id` DESC LIMIT 1");
        $row = mysqli_fetch_array($query);
        $sender = $row['sender'];
        $message = $row['message'];
        $time = $row['time'];
        $query1 = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$sender'");
        $row1 = mysqli_fetch_array($query1);
        $sender_id = $row1['id'];
        $sender_photo = $row1['photo'];


        if ($row['sender'] == $sender) {
            echo '<div class="w3-border w3-green w3-container w3-margin" style="width:90%;" id="sent">
                            <p class="w3-bar">
                                <img src="../media/dp/' . $sender_photo . '>" class="img-responsive img-circle w3-bar-item w3-right is-hidden-mobile" style="width:75px" alt="" srcset="">
                                <span class="w3-bar-item" style="width:91%">' . $message . '</span>
                            </p>
                            <span class="w3-left w3-margin-bottom w3-small">' . $time . '</span>
                        </div>';
        }
    }
}



if ($_POST['action'] == 'update') {

    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $id = $_POST['last_message'];

    $query = mysqli_query($conn, "SELECT * FROM `message` WHERE ((`sender`='$sender' AND `receiver`='$receiver') OR (`sender`='$receiver' AND `receiver`='$sender')) AND id > '$id' ");
    if (mysqli_num_rows($query)) {

        $row = mysqli_fetch_array($query);
        $new_id = $row['id'];

        $sender_new = $row['sender'];
        $message = $row['message'];
        $time = $row['time'];

        $query1 = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$sender_new'");
        $row1 = mysqli_fetch_array($query1);
        $sender_id = $row1['id'];
        $sender_photo = $row1['photo'];

        if ($row['sender'] == $sender) {
            $message =  '  <div class="w3-border w3-green w3-container w3-margin" style="width:90%;" id="sent">
                    <p class="w3-bar">
                        <img src="../media/dp/' . $sender_photo . '>" class="img-responsive img-circle w3-bar-item w3-right is-hidden-mobile" style="width:75px" alt="" srcset="">
                        <span class="w3-bar-item" style="width:91%">' . $message . '</span>
                    </p>
                    <span class="w3-left w3-margin-bottom w3-small">' . $time . '</span>
                </div>';
        } else {
            $message = '  <div class="w3-border w3-light-grey w3-container w3-margin" style="width:90%;" id="received">
                    <p class="w3-bar">
                        <img src="../media/dp/' . $sender_photo . '" class="img-responsive img-circle w3-bar-item is-hidden-mobile" style="width:75px" alt="" srcset="">
                        <span class="w3-bar-item" style="width:91%">' . $message . '</span>
                    </p>
                    <span class="w3-right w3-margin-bottom w3-small">' . $time . '</span>
                </div>';
        }

        $data = array();

        $data['message'] = $message;

        $data['new_id'] = $new_id;

        header("Content-Type: application/json");
        echo json_encode($data);
    }
}

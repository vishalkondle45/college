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

        $lm = $row['time'];
        $lm = strtotime($lm);
        $show_time = date("h:i", $lm);

        if ($row['sender'] == $sender) {
            echo '<div class="w3-leftbar w3-border-green w3-container" style="margin-bottom: 10px">' . $row['message'] . '<span class="w3-right w3-opacity w3-small">' . $show_time . '</span></div>';
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

        $lm = $row['time'];
        $lm = strtotime($lm);
        $show_time = date("h:i", $lm);

        if ($row['sender'] == $sender) {
            $message =  '<div class="w3-leftbar w3-border-green w3-container" style="margin-bottom: 10px">' . $row['message'] . '<span class="w3-right w3-opacity w3-small">' . $show_time . '</span></div>';
        } else {
            $message = '<div class="w3-leftbar w3-border-blue w3-container" style="margin-bottom: 10px">' . $row['message'] . '<span class="w3-right w3-opacity w3-small">' . $show_time . '</span></div>';
        }

        $data = array();

        $data['message'] = $message;

        $data['new_id'] = $new_id;

        header("Content-Type: application/json");
        echo json_encode($data);
    } else {
        echo false;
    }
}


if ($_POST['action'] == 'upvote') {
    $forum_id = $_POST['id'];
    if (mysqli_query($conn, "INSERT INTO `upvote` VALUES(NULL, '$forum_id', '$userid', current_timestamp())")) {
        echo true;
    }
}

if ($_POST['action'] == 'downvote') {
    $forum_id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `upvote` WHERE `reply_id`='$forum_id' AND `user_id`='$userid'")) {
        echo true;
    }
}


if ($_POST['action'] == 'follow') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "INSERT INTO `follow` VALUES(NULL, '$userid', '$id', '', current_timestamp())")) {
        echo true;
    } else {
        echo "INSERT INTO `follow` VALUES(NULL, '$userid', '$id', '', current_timestamp())";
    }
}

if ($_POST['action'] == 'cancel') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `follow` WHERE `following`='$id' AND `follower`='$userid'")) {
        echo true;
    } else {
        echo "DELETE FROM `follow` WHERE `following`='$id' AND `follower`='$userid'";
    }
}

if ($_POST['action'] == 'unfollow') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `follow` WHERE `following`='$id' AND `follower`='$userid'")) {
        echo true;
    } else {
        echo "DELETE FROM `follow` WHERE `following`='$id' AND `follower`='$userid'";
    }
}

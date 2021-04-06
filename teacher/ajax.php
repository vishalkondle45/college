<?php
include_once 'session.php';


if ($_POST['action'] == 'like') {
    $postid = $_POST['post_id'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likes WHERE `post_id`='$postid' AND `liker_id`='$userid' AND `liker_type`='$usertype'")) > 0) {
        if (mysqli_query($conn, "DELETE FROM likes WHERE `post_id`='$postid' AND `liker_id`='$userid' AND `liker_type`='$usertype'")) {
            echo 0;
        }
    } else {
        if (mysqli_query($conn, "INSERT INTO likes VALUES(NULL, '$postid', '$usertype', '$userid', NULL)")) {
            echo 1;
        }
    }
}

if ($_POST['action'] == 'comment') {
    $postid = $_POST['post_id'];
    $comment = $_POST['comment'];
    if (mysqli_query($conn, "INSERT INTO comments VALUES(NULL, '$postid', '$usertype', '$userid', '$comment', NULL)")) {
        // echo true;
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userid'");
        $row = mysqli_fetch_array($query);
        $photo = $row['photo'];
        $username = $row['username'];

        echo $text = '<hr><article class="media">
                                    <figure class="media-left">
                                        <div class="image-cropper is-48x48">
                                            <img src="../media/dp/' . $photo . '" alt="" srcset="" class="profile-pic">
                                        </div>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content has-text-dark">
                                            <p>
                                                <strong class="username">@' . $username . '</strong>
                                                <span class="is-size-7">1 sec ago</span>
                                                <br>
                                                <span class="commented">' . $comment . '</span>
                                            </p>
                                        </div>
                                    </div>
                                </article>';
    }
}

if ($_POST['action'] == 'message') {
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);
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
    $forum_id = $_POST['forum_id'];
    $id = $_POST['id'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `upvote` WHERE (`forum_id` ='$forum_id' AND `reply_id` = '$id') AND `user_id`='$userid'")) > 0) {
        if (mysqli_query($conn, "DELETE FROM `upvote` WHERE `forum_id` ='$forum_id' AND `user_id`='$userid'")) {
            echo 0;
        }
    } else {
        if (mysqli_query($conn, "INSERT INTO `upvote` VALUES(NULL, '$forum_id', '$id' ,'$userid', current_timestamp())")) {
            echo 1;
        }
    }
}

if ($_POST['action'] == 'follow') {
    $id = $_POST['id'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `follow` WHERE (`follower`= '$userid' AND `following`='$id') AND `status`= 1")) > 0) {
        if (mysqli_query($conn, "DELETE FROM `follow` WHERE (`follower`= '$userid' AND `following`='$id') AND `status`= 1")) {
            // echo "DELETE FROM `follow` WHERE (`follower`= '$userid' AND `following`='$id') AND `status`= 1";
            echo 0;
        }
    } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `follow` WHERE (`follower`= '$userid' AND `following`='$id') AND `status`= 0")) > 0) {
        if (mysqli_query($conn, "DELETE FROM `follow` WHERE (`follower`= '$userid' AND `following`='$id') AND `status`= 0")) {
            // echo "DELETE FROM `follow` WHERE (`follower`= '$userid' AND `following`='$id') AND `status`= 1";
            echo 0;
        }
    } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `follow` WHERE `follower`= '$userid' AND `following`='$id'")) == 0) {
        if (mysqli_query($conn, "INSERT INTO `follow` VALUES(NULL, '$userid', '$id', 0, current_timestamp())")) {
            // echo "SELECT * FROM `follow` WHERE `follower`= '$userid' AND `following`='$id'";
            echo 1;
        }
    }
}

if ($_POST['action'] == 'join_class') {
    $key = $_POST['class_id'];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM classes WHERE `class_key`='$key'"))) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM class_joined WHERE `user_id`='$userid' AND `class_key`='$key'")) == 0) {
            if (mysqli_query($conn, "INSERT INTO class_joined VALUES(NULL, '$key', '$userid', current_timestamp())")) {
                echo "Class Joined";
            } else {
                echo "Problem!!";
            }
        } else {
            echo "Already Joined in this Class";
        }
    } else {
        echo "Wrong Class Key!!";
    }
}

if ($_POST['action'] == 'star') {
    $id = $_POST['id'];
    // Checking Starred or Not
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM starred WHERE mail_id='$id' AND user_id='$userid'")) > 0) {
        if (mysqli_query($conn, "DELETE FROM starred WHERE mail_id='$id' AND user_id='$userid'")) {
            echo "unstar";
        }
    } else {
        if (mysqli_query($conn, "INSERT INTO `starred` VALUES(NULL, '$id', '$userid', current_timestamp())")) {
            echo "star";
        } else {
            echo "INSERT INTO `starred` VALUES(NULL, '$id', '$userid', current_timestamp())";
        }
    }
}

if ($_POST['action'] == 'compose') {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    if (mysqli_query($conn, "INSERT INTO inbox VALUES(NULL, '$email', '$to', '$subject', '$body', current_timestamp())")) {
        echo "Successful";
    } else {
        echo "sorry";
    }
}

if ($_POST['action'] == 'accept') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "UPDATE follow SET `status`=1 WHERE `id`='$id'")) {
        echo 1;
    }
}
if ($_POST['action'] == 'reject') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM follow WHERE `id`='$id'")) {
        // echo 1;
    }
    echo "DELETE FROM follow WHERE `id`='$id'";
}

if ($_POST['action'] == 'delete_notes') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `notes` WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_assignment') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `assignment` WHERE id='$id'")) {
        echo true;
    }
}

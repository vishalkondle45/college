<?php
include_once 'session.php';
if ($_POST['action'] == 'check_username') {
    $username = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($query) > 0) {
        echo "1";
        exit();
    } else {
        echo "0";
    }
}
if ($_POST['action'] == 'check_email') {
    $email = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        echo "1";
        exit();
    } else {
        echo "0";
    }
}
if ($_POST['action'] == 'check_mobile') {
    $mobile = $_POST['text'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE mobile='$mobile'");
    if (mysqli_num_rows($query) > 0) {
        echo "1";
        exit();
    } else {
        echo "0";
    }
}

if ($_POST['action'] == 'delete_notice') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM noticeboard WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_post') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM posts WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_poll') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM poll WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_forum') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM forums WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_student') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `users` WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_year') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `year` WHERE id='$id'")) {
        echo true;
    }
}

if ($_POST['action'] == 'delete_dept') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `department` WHERE id='$id'")) {
        echo true;
    }
}

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
    // echo "SELECT * FROM likes WHERE `post_id`='$postid' AND `liker_id`='$userid' AND `liker_type`='$usertype'";
}

if ($_POST['action'] == 'comment') {
    $postid = $_POST['post_id'];
    $comment = $_POST['comment'];
    if (mysqli_query($conn, "INSERT INTO comments VALUES(NULL, '$postid', '$usertype', '$userid', '$comment', NULL)")) {
        // echo true;
        $query = mysqli_query($conn, "SELECT * FROM college WHERE id = '$collegeid'");
        $row = mysqli_fetch_array($query);
        $photo = $row['logo'];
        $username = $row['username'];

        echo $text = '<hr><article class="media">
                                    <figure class="media-left">
                                        <div class="image-cropper is-48x48">
                                            <img src="../media/logo/' . $photo . '" alt="" srcset="" class="profile-pic">
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

if ($_POST['action'] == 'delete_education') {
    $id = $_POST['id'];
    if (mysqli_query($conn, "DELETE FROM `education` WHERE id='$id'")) {
        echo true;
    }
}

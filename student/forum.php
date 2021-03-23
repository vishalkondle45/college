<?php
include_once 'header.php';
// echo current_timestamp();
if ((!isset($_GET['id'])) || $_GET['id'] == '') {
    echo "<script>alert('You Are Not Authorized for this forum'); window.location='forums.php'</script>";
}
if (isset($_GET['id'])) {
    $forum_id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM forums WHERE id = '$forum_id'");
    $row = mysqli_fetch_array($query);
    if ($row['college_id'] != $collegeid) {
        echo "<script>alert('You Are Not Authorized for this forum'); window.location='forums.php'</script>";
    }
    $id = $row['user_id'];
    $query1 = mysqli_query($conn, "SELECT * FROM users WHERE `id`='$id'");
    $row1 = mysqli_fetch_array($query1);
}
if (isset($_POST['reply'])) {
    $reply_text = nl2br($_POST['reply_text']);
    // echo "<script>alert('Hello')</script>";
    if (mysqli_query($conn, "INSERT INTO `forum_replies` (`id`, `forum_id`, `replier_id`, `reply`, `time`) VALUES (NULL, '$forum_id', '$userid', '$reply_text', current_timestamp())")) {
        echo "<script>window.location.href='forum.php?id=" . $forum_id . "'</script>";
    } else {
        echo "INSERT INTO `forum_replies` (`id`, `forum_id`, `replier_id`, `reply`, `time`) VALUES (NULL, '$forum_id', '$userid', '$reply_text', current_timestamp())";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['forum']; ?></title>
</head>
<style>
    .image-cropper {
        width: 50px;
        height: 50px;
        position: relative;
        overflow: hidden;
        border-radius: 50%;
        border: solid 0.0002em black;
    }

    .profile-pic {
        display: inline;
        margin: 0 auto;
        width: auto;
    }

    body {
        color: #000 !important;
        background-color: #EDF0F4 !important
    }
</style>

<body>
    <br>
    <div class="columns section">
        <div class="column is-1"></div>
        <div class="column is-10">
            <div class="w3-container w3-white w3-leftbar w3-border-red">
                <p class="w3-xlarge"><?php echo $row['forum']; ?></p>
                <hr class="style1">
                <div class="w3-bar" style="margin:0;">
                    <figure class="w3-bar-item media-left w3-hide-small" style="margin: 0; padding-right: 0;">
                        <div class="image-cropper is-48x48">
                            <img src="../media/dp/<?php echo $row1['photo']; ?>" alt="" srcset="" class="profile-pic">
                        </div>
                    </figure>
                    <div class="w3-bar-item" style="margin:0;">
                        <a href="user.php?key=<?php echo $row1['unique_key']; ?>">
                            <b><span class="">By <?php echo $row1['username']; ?></span></b>
                        </a>
                        <br>
                        <span class="w3-small w3-opacity"><?php echo $row['time']; ?></span>
                    </div>
                    <div class="w3-bar-item w3-right" style="margin:0;">
                        <?php
                        if ($id != $userid) {
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$id' AND `following`='$userid'");
                            $row6 = mysqli_fetch_array($query6);
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow" id="<?php echo $id; ?>"> <i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow" id="<?php echo $id; ?>"> <i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow" id="<?php echo $id; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag"><?php echo mysqli_num_rows($query6) ?></span> </button>
                        <?php
                                }
                            }
                        }
                        ?>
                        <a class="button is-info" href="#reply"> <i class="fa fa-reply"></i> &nbsp; Reply</a>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php echo $forum_id; ?>" id="forum_id">
            <hr class="w3-black">
            <?php
            $query2 = mysqli_query($conn, "SELECT * FROM `forum_replies` WHERE `forum_id`='$forum_id'");
            while ($row2 = mysqli_fetch_array($query2)) {
                $replier_id = $row2['replier_id'];
                $query3 = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$replier_id'");
                $row3 = mysqli_fetch_array($query3);
                $query4 = mysqli_query($conn, "SELECT * FROM `forums` WHERE `user_id`='$replier_id'");
            ?>
                <div class="w3-row w3-white w3-container w3-padding w3-leftbar w3-border-blue w3-responsive">
                    <div class="w3-col w3-center w3-border-right w3-hide-small" style="width:10%;">
                        <b>
                            <a class="" href="user.php?key=<?php echo $row1['unique_key']; ?>"><?php echo $row3['username'] ?></a>
                        </b>
                        <p class=""><?php echo $row3['usertype'] ?></p>
                        <br>
                        <img src="../media/dp/<?php echo $row3['photo'] ?>" alt="" srcset="" class="w3-image w3-circle w3-hide-small" style="width:75px"><br>
                        <p class="w3-opacity"><?php echo mysqli_num_rows($query4) ?> Forums</p>
                    </div>
                    <div class="w3-col w3-container" style="width:90%;">
                        <span class="w3-right w3-opacity w3-small">Posted on <?php echo $row2['time'] ?></span>
                        <span class="w3-responsive w3-padding"><?php echo $row2['reply'] ?></span>
                        <hr>
                        <?php
                        $reply_id = $row2['id'];
                        $user_id = $row3['id'];
                        $query5 = mysqli_query($conn, "SELECT * FROM upvote WHERE reply_id='$reply_id' AND `user_id`='$userid'");
                        $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$user_id' AND `following`='$userid'");
                        $row6 = mysqli_fetch_array($query6);
                        $query7 = mysqli_query($conn, "SELECT * FROM `upvote` WHERE reply_id = '$reply_id'");
                        if (mysqli_num_rows($query5) == 0) { ?>
                            <button class="button is-success is-outlined upvote" id="<?php echo $row2['id']; ?>"> <i class="fa fa-arrow-up"></i> &nbsp; Upvote &emsp; <span class="tag is-success"><?php echo mysqli_num_rows($query7) ?></span> </button>
                        <?php
                        } else { ?>
                            <button class="button is-success upvote" id="<?php echo $row2['id']; ?>"> <i class="fa fa-arrow-down"></i> &nbsp; Downvote &emsp; <span class="tag"><?php echo mysqli_num_rows($query7) ?></span> </button>
                            <?php
                        }
                        if ($user_id != $userid) {
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow" id="<?php echo $row2['id']; ?>"> <i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow" id="<?php echo $row2['id']; ?>"> <i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow" id="<?php echo $row2['id']; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag"><?php echo mysqli_num_rows($query6) ?></span> </button>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <br>
            <?php } ?>
            <br><br><br><br><br><br><br><br><br><br><br>
            <div class="w3-white w3-container w3-padding w3-border w3-responsive" id="reply">
                <form action="" method="post">
                    <p class="w3-xlarge"><b>Join the Conversation</b></p>
                    <hr>
                    <textarea name="reply_text" class="w3-input w3-border" id="" cols="30" rows="10" placeholder="Reply Here.."></textarea><br>
                    <center><button class="button is-success" name="reply">Reply</button></center>
                </form>
            </div>
            <br><br><br><br><br><br>
        </div>
        <div class=" column is-1"></div>

    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $(".upvote").click(function() {
            var id = $(this).attr("id");
            var votes = $(this).children("span").val();
            var forum_id = $("#forum_id").val();
            var t = $(this);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'upvote',
                    id: id,
                    forum_id: forum_id
                },
                success: function(data) {
                    if (data == 1) {
                        t.html('<i class="fa fa-arrow-down"></i> &nbsp; Downvote &emsp; <span class="tag">' + ++votes + '</span>');
                        t.removeClass('is-outlined');
                    } else if (data == 0) {
                        t.html('<i class="fa fa-arrow-up"></i> &nbsp; Upvote &emsp; <span class="tag">' + votes-- + '</span>');
                        t.addClass('is-outlined');
                    }
                }
            })
        });

        $(".follow").click(function() {
            var id = $(this).attr("id");
            var followers = $(this).children("span").val();
            var t = $(this);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'follow',
                    id: id
                },
                success: function(data) {
                    if (data == 0) {
                        t.html('<i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                    } else if (data == 1) {
                        t.html('<i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
                    }
                }
            })
        });
    });
</script>
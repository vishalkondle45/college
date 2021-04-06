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
    if (mysqli_query($conn, "INSERT INTO `forum_replies` (`id`, `forum_id`, `replier_type`, `replier_id`, `reply`, `time`) VALUES (NULL, '$forum_id', '$usertype', '$userid', '$reply_text', current_timestamp())")) {
        echo "<script>window.location.href='forum.php?id=" . $forum_id . "'</script>";
    } else {
        echo "INSERT INTO `forum_replies` (`id`, `forum_id`, `replier_type`, `replier_id`, `reply`, `time`) VALUES (NULL, '$forum_id', '$usertype', '$userid', '$reply_text', current_timestamp())";
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
                        <a href="profile.php?user=<?php echo $row1['username']; ?>">
                            <b><span class="">By <?php echo $row1['username']; ?></span></b>
                        </a>
                        <br>
                        <span class="w3-small w3-opacity"><?php echo $row['time']; ?></span>
                    </div>
                    <div class="w3-bar-item w3-right" style="margin:0;">
                        <div class="control">
                            <div class="tags has-addons">
                                <?php
                                $current_user = $row1['id'];
                                $query = mysqli_query($conn, "SELECT * FROM `follow` WHERE `following` = '$current_user' AND `status`=1");
                                ?>
                                <span class="tag is-dark w3-large"><?php echo mysqli_num_rows($query); ?></span>
                                <span class="tag is-info w3-large">Followers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php echo $forum_id; ?>" id="forum_id">
            <hr class="w3-black">
            <?php
            $query2 = mysqli_query($conn, "SELECT * FROM `forum_replies` WHERE `forum_id`='$forum_id'");
            while ($row2 = mysqli_fetch_array($query2)) {
                $reply_id = $row2['id'];
                $replier_id = $row2['replier_id'];
                $query3 = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$replier_id'");
                $row3 = mysqli_fetch_array($query3);
                $query4 = mysqli_query($conn, "SELECT * FROM `forums` WHERE `user_id`='$replier_id'");
            ?>
                <div class="w3-row w3-white w3-container w3-padding w3-leftbar w3-border-blue w3-responsive">
                    <div class="w3-col w3-center w3-border-right w3-hide-small" style="width:10%;">
                        <b>
                            <a class="" href="profile.php?key=<?php echo $row1['username']; ?>"><?php echo $row3['username'] ?></a>
                        </b>
                        <p class=""><?php echo $row3['usertype'] ?></p>
                        <br>
                        <img src="../media/dp/<?php echo $row3['photo'] ?>" alt="" srcset="" class="w3-image w3-circle w3-hide-small" style="width:75px"><br>
                        <p class="w3-opacity"><?php echo mysqli_num_rows($query4) ?> Forums</p>
                    </div>
                    <div class="w3-col w3-container" style="width:90%;">
                        <span class="w3-right w3-opacity w3-small">Posted on <?php echo $row2['time'] ?></span>
                        <span class="w3-responsive w3-padding"><?php echo $row2['reply'] ?></span>
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM `upvote` WHERE `reply_id` = '$reply_id'");
                                    // echo "SELECT * FROM `upvote` WHERE `reply_id` = '$reply_id'";
                                    ?>
                                    <span class="tag is-dark"><?php echo mysqli_num_rows($query); ?></span>
                                    <span class="tag is-success">Upvotes</span>
                                </div>
                            </div>
                            <div class="control">
                                <div class="tags has-addons">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM `follow` WHERE `following` = '$replier_id' AND `status`=1");
                                    ?>
                                    <span class="tag is-dark"><?php echo mysqli_num_rows($query); ?></span>
                                    <span class="tag is-info">Followers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            <?php } ?>
        </div>
        <div class=" column is-1"></div>

    </div>
</body>

</html>

<script>
    $(document).ready(function() {

    });
</script>
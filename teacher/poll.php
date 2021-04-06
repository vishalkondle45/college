<?php

include_once 'header.php';

if (isset($_POST['vote'])) {
    $poll_id = $_GET['id'];
    $choice = $_POST['choice'];
    if (mysqli_query($conn, "INSERT INTO `results` VALUES(NULL, '$poll_id','$userid', '$choice')")) {
        echo "<script>window.location.href='http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]'</script>";
    } else {
        echo "<script>alert('No');</script>";
        echo "INSERT INTO INTO `results` VALUES(NULL, '$poll_id','$userid', '$choice')";
    }
}


if ((!isset($_GET['id'])) || $_GET['id'] == '') {
    echo "<script>alert('You Are Not Authorized for this Poll'); window.location='polls.php'</script>";
}
if (isset($_GET['id'])) {
    echo $forum_id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM poll WHERE id = '$forum_id'");
    $row = mysqli_fetch_array($query);
    if ($row['college_id'] != $collegeid) {
        echo "<script>alert('You Are Not Authorized for this Poll'); window.location='polls.php'</script>";
    }
    $id = $row['user_id'];
    $poll_by = $row['poll_by'];
    if ($poll_by != 'college') {
        $query1 = mysqli_query($conn, "SELECT * FROM `$poll_by` WHERE `id`='$id'");
    } else {
        $query1 = mysqli_query($conn, "SELECT * FROM `$poll_by` WHERE `id`='$collegeid'");
    }
    $row1 = mysqli_fetch_array($query1);

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM views WHERE `content`='poll' AND `content_id`='$forum_id' AND `viewer_id`='$userid'")) == 0) {
        if (mysqli_query($conn, "INSERT INTO views VALUES(NULL, 'poll', '$forum_id', '$userid', current_timestamp())")) {
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['question']; ?></title>
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
                <p class="w3-xlarge w3-margin-top"><?php echo $row['question']; ?></p>
                <hr class="style1">
                <form action="" method="post">
                    <div class="w3-container">
                        <?php
                        $colors = array("is-info", "is-success", "is-link", "is-warning", "is-danger", "is-primary", "is-dark", "is-black");
                        $q = mysqli_query($conn, "SELECT * FROM options WHERE poll_id='$forum_id'");
                        $results = mysqli_query($conn, "SELECT * FROM results WHERE poll_id='$forum_id'");
                        $current = 7;
                        while ($row2 = mysqli_fetch_array($q)) {

                            $selected = $row2['id'];
                            $option_selected = mysqli_query($conn, "SELECT * FROM results WHERE choice_id = '$selected'");

                            $random = mt_rand(0, 7);
                            if ($random == $current)
                                $random = mt_rand(0, 7);
                            else
                                $current = $random;

                            $total_votes = mysqli_num_rows($results);
                            $this_option = mysqli_num_rows($option_selected);
                            $percentage = 0;
                            if ($total_votes != 0) {
                                $percentage = ($this_option / $total_votes) * 100;
                            }

                        ?>
                            <p>
                                <?php
                                $voted = mysqli_query($conn, "SELECT * FROM `results` WHERE `poll_id`='$forum_id' AND `user_id`='$userid'");
                                if (mysqli_num_rows($voted) == 0) {
                                ?>
                                    <span><input type="radio" class="w3-radio w3-margin-bottom" name="choice" value="<?php echo $row2['id']; ?>">
                                    <?php
                                } else {
                                    $r = mysqli_fetch_assoc($voted);
                                    if ($r['choice_id'] == $row2['id']) {
                                        echo '<i class="fa fa-check"></i>';
                                    }
                                    ?>
                                        <?php
                                    }
                                        ?><?php echo $row2['choice'] . ' - ' . round($percentage) . '%'; ?></span>
                                    <progress class="progress <?php echo $colors[$random]; ?> is-large" value="<?php echo $percentage; ?>" max="100"></progress>
                            </p>
                        <?php
                        }
                        if (mysqli_num_rows($voted) == 0) {
                        ?>
                            <button class="w3-btn w3-green" name="vote">
                                <i class="fa fa-vote-yea"></i>Vote
                            </button>
                        <?php } ?>
                    </div>
                </form>
                <hr>
                <div class="w3-bar w3-margin-bottom" style="margin:0;">
                    <figure class="w3-bar-item media-left w3-hide-small" style="margin: 0; padding-right: 0;">
                        <div class="image-cropper is-48x48">
                            <?php if ($poll_by != 'college') { ?>
                                <img src="../media/dp/<?php echo $row1['photo']; ?>" alt="" srcset="" class="profile-pic">
                            <?php } else { ?>
                                <img src="../media/logo/<?php echo $row1['logo']; ?>" alt="" srcset="" class="profile-pic">
                            <?php } ?>
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
                        <?php
                        if ($id != $userid && $id != 0) {
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$id' AND `following`='$userid'");
                            $row6 = mysqli_fetch_array($query6);
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow" id="<?php echo $id; ?>"> Follow </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow" id="<?php echo $id; ?>"> Requested </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow" id="<?php echo $id; ?>"> Following </button>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class=" column is-1"></div>

    </div>
</body>

</html>

<script>
    $(document).ready(function() {
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
                        t.html('Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                    } else if (data == 1) {
                        t.html('Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
                    }
                }
            })
        });
    });
</script>
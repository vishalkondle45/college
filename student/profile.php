<?php
include_once 'header.php';
include_once 'session.php';

if (empty($_GET['user']) || $_GET['user'] == '') {
    echo "<script>window.location.href='profile.php?user=" . $user_key . "'</script>";
}

if (isset($_GET['user'])) {
    $key = $_GET['user'];
    $query1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_key='$key' AND college_id='$collegeid'");
    $row1 = mysqli_fetch_assoc($query1);
    if (mysqli_num_rows($query1) != 1) {
        echo "<script>alert('Oversmart!!')</script>";
        echo "<script>window.location.href='profile.php?user=" . $user_key . "'</script>";
    } else {
        $receiver = $_SESSION['chat_user_id'] = $row1['id'];
        $posts = mysqli_query($conn, "SELECT * FROM `posts` WHERE `userid`='$receiver'");
        $followers = mysqli_query($conn, "SELECT * FROM `follow` WHERE `follower`='$receiver' AND `status`=1");
        $following = mysqli_query($conn, "SELECT * FROM `follow` WHERE `following`='$receiver' AND `status`=1");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatHub</title>
</head>
<style>
    @media only screen and (max-width: 1026px) {
        .hidethis {
            display: none;
        }
    }

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
        /* margin-left: 25%; */
        /* height: 100%; */
        width: auto;
    }
</style>


<body>
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%">
            <br>
            <div class="w3-container w3-row">
                <!-- Image -->
                <div class="w3-col" style="width:30%">
                    <br>
                    <img src="../media/dp/<?php echo $row1['photo']; ?>" alt="" class="w3-image w3-circle" style="width:150px" srcset="">
                </div>
                <!-- Bio -->
                <div class="w3-col" style="width:70%">
                    <h3><?php echo $row1['username']; ?>
                        &emsp;
                        <?php
                        $query3 = mysqli_query($conn, "SELECT * FROM `follow` WHERE `follower`= '$userid' AND `following`='$receiver'");
                        $row3 = mysqli_fetch_array($query3);
                        if ($userid != $receiver) {
                            if (mysqli_num_rows($query3) == 0) {
                        ?>
                                <button class="button is-info follow" id="<?php echo $receiver ?>">Follow</button>
                                <?php
                            } else {
                                if ($row3['status'] == 0) {
                                ?>
                                    <button class="button is-outlined cancel" id="<?php echo $receiver ?>">Requested</button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-outlined unfollow" id="<?php echo $receiver ?>">Following</button>
                        <?php
                                }
                            }
                        }
                        ?>
                    </h3>
                    <br>
                    <p class="w3-row">
                        <!-- Posts -->
                        <span class="w3-third"> <b><?php echo mysqli_num_rows($posts); ?></b> Posts</span>
                        <!-- Followers -->
                        <span class="w3-third"> <b><?php echo mysqli_num_rows($followers); ?></b> Followers</span>
                        <!-- Following -->
                        <span class="w3-third"> <b><?php echo mysqli_num_rows($following); ?></b> Following</span>
                    </p>
                    <br>
                    <div>
                        <b>
                            <p><?php echo $row1['fname'] . ' ' . $row1['mname'] . ' ' . $row1['lname']; ?></p>
                        </b>
                        <?php echo $row1['education'] . ' - ' . $row1['department']  ?><br>
                        <?php echo "<b>Key - " . $row1['unique_key'] . "</b>"; ?>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Posts -->
            <div>
                <div class="w3-row-padding w3-margin-top">

                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM posts WHERE `userid`='$receiver'");
                    $i = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $i++;
                    ?>
                        <div class="w3-third">
                            <div class="w3-card-4">
                                <a href="post.php?post=<?php echo $row['post_key']; ?>">
                                    <img src="../media/posts/<?php echo $row['post']; ?>" style="width:100%">
                                </a>
                            </div>
                        </div>
                    <?php
                        if ($i % 3 === 0)
                            echo "<p>&emsp;</p>";
                    } ?>
                </div>
            </div>

        </div>
        <div class="w3-col" style="width:20%"></div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        $(".follow").click(function() {
            var id = $(this).attr("id");
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'follow',
                    id: id
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $(".cancel").click(function() {
            var id = $(this).attr("id");
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'cancel',
                    id: id
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $(".unfollow").click(function() {
            var id = $(this).attr("id");
            if (confirm("If you change your mind, you'll have to request to follow again.")) {
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    data: {
                        action: 'unfollow',
                        id: id
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

    });
</script>